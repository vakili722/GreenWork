<?php

namespace App\Http\Library;

use Illuminate\Database\Eloquent\Collection;

class Menu {
    /*
     * @param $pattenr 
     * @argument TREE or LABLE
     */

    public static function builder(Collection $menus, $path, $pattern = 'TREE') {
        $result = '';
        $menus = $menus->groupBy('group_icon');

//        echo '<div style="direction: ltr;">';
//        \Symfony\Component\VarDumper\VarDumper::dump($menus);
//        echo '</div>';

        foreach ($menus as $menu) {
            $result .= Menu::html_code($menu, $pattern
                            , $menu->first()->group_alias, 'static', $menu->first()->group_icon, $path);
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

        if ($type == 'static') {
            foreach ($items as $item) {
                if ($path == $item->name) {
                    $split = explode('/', $path);
                    $last = count($split) - 1;
                    $name = $split[$last];
                    $view_is_active = 'active';
                }
            }
        }

        $html = '<li class="treeview ' . $view_is_active . '">'
                . '<a href="#">'
                . '<i class="' . $group_icon . '"></i>'
                . '<span> ' . $alias . '</span>'
                . '<i class="fa fa-angle-right pull-right"></i>'
                . '</a>'
                . '<ul class="treeview-menu">';

        if ($type == 'static') {
            foreach ($items as $item) {
                $item_is_active = '';
                if ($name == $item->name) {
                    $item_is_active = 'active';
                }
                $html .= '<li class="' . $item_is_active . '"><a href="'
                        . url($item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        } else if ($type == 'dynamic') {
            foreach ($items as $item) {
                $item_is_active = '';
                if ($name == $item->name) {
                    $item_is_active = 'active';
                }
                $html .= '<li class="' . $item_is_active . '"><a href="'
                        . url('page/' . $item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        }

        $html .= '</ul>'
                . '</li>';

        return $html;
    }

    private static function lable_view(Collection $items, $alias, $type, $path) {
        $html = '<li class="header"> ' . $alias . '</li>';
        if ($type == 'static') {
            foreach ($items as $item) {
                $html .= '<li><a href="' . url($item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        } else if ($type == 'dynamic') {
            foreach ($items as $item) {
                $html .= '<li><a href="' . url('page/' . $item->name) . '">'
                        . '<i class="' . $item->icon . '"></i> '
                        . $item->alias
                        . '</a></li>';
            }
        }

        return $html;
    }

}
