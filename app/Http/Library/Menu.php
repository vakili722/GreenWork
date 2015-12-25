<?php

namespace App\Http\Library;

use Illuminate\Database\Eloquent\Collection;

class Menu {

    public static function builder(Collection $menus
    , $path
    , Collection $menus_dynamic = null
    , $pattern = ['FORM' => 'TREE', 'DYNAMIC' => 'LABLE', 'REPORT' => 'LABLE']) {
        $result = '';

        $form = $menus->where('type', 'STATIC');
        $report = $menus->where('type', 'REPORT');

        if ($form->toArray() != []) {
            $html_form = Menu::html_code($form, array_get($pattern, 'FORM')
                            , 'ابزارها', 'static', 'fa fa-suitcase', $path);
        }if ($report->toArray() != []) {
            $html_report = Menu::html_code($report, array_get($pattern, 'REPORT')
                            , 'گزارشات', 'static', 'fa fa-book', $path);
        }

        $keys = array_keys($pattern);
        foreach ($keys as $key) {
            if (isset(get_defined_vars()['html_' . strtolower($key)])) {
                $result .= get_defined_vars()['html_' . strtolower($key)];
            }
        }
        return $result;
    }

    private static function html_code(Collection $items, $pattern, $alias, $type, $group_icon, $path) {
        if ($pattern == 'TREE') {
            return Menu::tree_view($items, $alias, $type, $group_icon, $path);
        } else if ($pattern == 'LABLE') {
            return Menu::lable_view($items, $alias, $type, $path);
        } else {
            return '';
        }
    }

    private static function tree_view(Collection $items, $alias, $type, $group_icon, $path) {
        $view_is_active = '';
        $name = null;
        if (starts_with($path, 'page/' . $type)) {
            $split = explode('/', $path);
            $last = count($split) - 1;
            $name = $split[$last];
            $view_is_active = 'active';
        }
        $html = '<li class="treeview ' . $view_is_active . '">'
                . '<a href="#">'
                . '<i class="' . $group_icon . '"></i>'
                . '<span> ' . $alias . '</span>'
                . '<i class="fa fa-angle-right pull-right"></i>'
                . '</a>'
                . '<ul class="treeview-menu">';
        if ($type == 'static' || $type == 'dynamic') {
            foreach ($items as $item) {
                $item_is_active = '';
                if ($name == $item->name) {
                    $item_is_active = 'active';
                }
                $html .= '<li class="' . $item_is_active . '"><a href="'
                        . url('page/' . $type . '/' . $item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        } else if ($type == 'report') {
            return '';
        }
        $html .= '</ul>'
                . '</li>';
        return $html;
    }

    private static function lable_view(Collection $items, $alias, $type, $path) {
        $html = '<li class="header"> ' . $alias . '</li>';
        if ($type == 'static' || $type == 'dynamic') {
            foreach ($items as $item) {
                $html .= '<li><a href="' . url('page/' . $type . '/' . $item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        } else if ($type == 'report') {
            return '';
        }
        return $html;
    }

}
