<?php
class Pagination
{

    /**
     * 获得分页字符串/html代码
     * @param  integer  $currentPage    当前显示页码
     * @param  integer  $recordPerPage  每页显示的记录数
     * @param  integer  $totalRecord    总记录数
     * @param  integer  $visiblePageNum 显示出的可点击的页面数量，比如值为5时: 1...5,6,7,8,9...18，中间显示出来的数量就是visiblePageNum
     * @return string                   拼接好的分页html代码
     */
    public static function getPagination($currentPage, $recordPerPage, $totalRecord, $visiblePageNum)
    {
        // 计算总页数
        $totalPage = ceil((float)$totalRecord / $recordPerPage);  
        // 计算当前页左右显示的偏移量
        $offset = (int)($visiblePageNum / 2) + 1;
        // 是否有左右折叠
        $leftFold = false;
        $rightFold = false;

        if ($totalPage < $visiblePageNum) {
            // 总页数小于最大显示页数，全部显示
            $start = 1;
            $end = $totalPage;
        } elseif ($currentPage <= $offset) {
            // 左边无折叠，右面有折叠
            $start = 1;
            $end = $start + $visiblePageNum - 1;
            $rightFold = true;
        } elseif (($totalPage - $currentPage) >= $offset) {
            // 左右均有折叠
            $start = $currentPage - $offset + 1;
            $end = $currentPage + $offset - 1;
            $leftFold = true;
            $rightFold = true;
        } else {
            // 左边有折叠，右边无折叠
            $start = $totalPage - $visiblePageNum + 1;
            $end = $totalPage;
            $leftFold = true;
        }

        // 开始拼接
        $pagination = '<ul class="pagination">';
        // 去除URI中多余的"&p=someNumber"
        $pattern = '(&p=[0-9]+)';
        $url = preg_replace($pattern, '', $_SERVER['REQUEST_URI']);
        // 首页与上一页
        if ($currentPage == 1) {
            $pagination .= "<li class=\"disabled\"><a>首页</a></li>";
            $pagination .= "<li class=\"disabled\"><a>上一页</a></li>";
        } else {
            $pagination .= "<li><a href=\"$url&p=1\">首页</a></li>";
            $pagination .= "<li><a href=\"$url&p=" . ($currentPage - 1) . "\">上一页</a></li>";
        }
        // 左折叠
        if ($leftFold) {
            $pagination .= "<li class=\"disabled\"><a>...</a></li>";
        }
        // 显示页码
        for ($i = $start; $i <= $end; ++$i) {
            if ($i == $currentPage) {
                $pagination .= "<li class=\"active\"><a href=\"$url\">$i</a></li>";
            } else {
                $pagination .= "<li><a href=\"$url&p=$i\">$i</a></li>";
            }
        }
        // 右折叠
        if ($rightFold) {
            $pagination .= "<li class=\"disabled\"><a>...</a></li>";
        }
        // 下一页与尾页
        if ($currentPage == $totalPage) {
            $pagination .= "<li class=\"disabled\"><a>下一页</a></li>";
            $pagination .= "<li class=\"disabled\"><a>尾页</a></li>";
        } else {
            $pagination .= "<li><a href=\"$url&p=" . ($currentPage + 1) . "\">下一页</a></li>";
            $pagination .= "<li><a href=\"$url&p=$totalPage\">尾页</a></li>";
        }
        $pagination .= '</ul>';

        return $pagination;
    }

    /**
     * 获得当前页码数
     * @return interger
     */
    public static function getCurrentPageNum()
    {
        if (!isset($_REQUEST['p']) ||
            !is_numeric($_REQUEST['p'])) {
            return 1;
        } else {
            return $_REQUEST['p'];
        }
    }
}