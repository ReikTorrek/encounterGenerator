<?php
include_once 'Component.php';
include_once dirname(__DIR__, 2) . '/const.php';

class CurrentPropPageRenderer
{
    public function renderItem($prop) {
        echo
            '
            <table class="pattern-table">
	            <tbody>
                    <tr id="'. $prop['id'] .'">
                        <td class="tdFirstColumn">' . $prop['name'] .'</td>
                        <td> ' . @$prop['description'] .'</td>
                    </tr>
                </tbody>
            </table>
            ';
    }
}