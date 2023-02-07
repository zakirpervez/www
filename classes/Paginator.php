<?php

class Paginator
{
    public $limit;
    public $offset;
    public $previousPage;
    public $nextPage;

    public function __construct($page, $record_per_page, $total_record)
    {
        $this->limit = $record_per_page;
        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => ['default' => 1, 'min_range' => 1]
        ]);

        if ($page > 1) {
            $this->previousPage = $page - 1;
        }
        
        $total_pages = ceil($total_record / $record_per_page);
        if ($page < $total_pages) {
            $this->nextPage = $page + 1;
        }
        
        $this->offset = $record_per_page * ($page - 1);
    }
}
