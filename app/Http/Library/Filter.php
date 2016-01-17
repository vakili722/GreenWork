<?php

namespace App\Http\Library;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Filter {

    public static function Rendering($model, $columnsInfo, $filter, $perPage) {
        if ($filter != null) {
            $whereCondition = '$model::';

            $temp = [];
            foreach ($columnsInfo as $key => $value) {
                $temp = array_add($temp, $key, collect($value));
            }
            $columnsInfo = $temp;

            $filter = Filter::Interpret($filter, $columnsInfo);
            $operations = $filter['operations'];
            $operands = $filter['operands'];

            function find_key($alias, $columnsInfo) {
                foreach ($columnsInfo as $key => $col) {
                    if ($col->contains($alias)) {
                        return $key;
                    }
                }
            }

            function add_condition(& $isFirst, & $whereCondition, $key, $value, $colInfo, $operations, & $i) {
                if ($isFirst) {
                    $whereCondition .= "where('" . $key . "','" . $value[0] . "')->";
                    $isFirst = FALSE;
                } elseif ($operations != []) {
                    if ($operations[$i] == '&') {
                        $whereCondition .= "where('" . $key . "','" . $value[0] . "')->";
                        $i++;
                    } elseif ($operations[$i] == '|') {
                        $whereCondition .= "orWhere('" . $key . "','" . $value[0] . "')->";
                        $i++;
                    }
                }
            }

            function add_condition_wherethrough(& $isFirst, & $whereCondition, $key, $value, $colInfo, $operations, & $i) {
                $wherethrough = $colInfo['wherethrough'];
                $class = $colInfo['class'];
                $el = $class::where($wherethrough['key'], $value)->get();
                $id = $el->first()->$wherethrough['value'];
                if ($isFirst) {
                    $whereCondition .= "where('" . $key . "','" . $id . "')->";
                    $isFirst = FALSE;
                } elseif ($operations != []) {
                    if ($operations[$i] == '&') {
                        $whereCondition .= "where('" . $key . "','" . $id . "')->";
                        $i++;
                    } elseif ($operations[$i] == '|') {
                        $whereCondition .= "orWhere('" . $key . "','" . $id . "')->";
                        $i++;
                    }
                }
            }

            $i = 0;
            $isFirst = TRUE;
            foreach ($operands as $item) {
                $key = find_key(key($item), $columnsInfo);
                if (!$columnsInfo[$key]->has('wherethrough')) {
                    add_condition($isFirst, $whereCondition, $key, array_values($item), $columnsInfo[$key], $operations, $i);
                } else {
                    add_condition_wherethrough($isFirst, $whereCondition, $key, array_values($item), $columnsInfo[$key], $operations, $i);
                }
            }

//            echo '<div style="direction: ltr">';
//            \Symfony\Component\VarDumper\VarDumper::dump($operations);
//            \Symfony\Component\VarDumper\VarDumper::dump($operands);
//            \Symfony\Component\VarDumper\VarDumper::dump($columnsInfo);
//            \Symfony\Component\VarDumper\VarDumper::dump($whereCondition);
//            echo '</div>';

            return eval('return ' . $whereCondition . "paginate($perPage);");
        } else {
            return $model::paginate($perPage);
        }
    }

    private static function Interpret($filter) {
        $operation;
        preg_match_all('/[|\&]/', $filter, $operation);
        $operand = preg_split('/[|\&]/', $filter);

        $i = 0;
        $temp = [];
        foreach ($operand as $key => $value) {
            $temp[$i++] = [explode(':', $value)[0] => explode(':', $value)[1]];
        }

        return ['operations' => $operation[0], 'operands' => $temp];
    }

}
