<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Application
{
	private $items_per_page = 20;


	/**
	 * First for our app
	 */
	public function index()
	{

            $this->page(1);


	}

	// Show a single page of transactions
	private function show_page($histories)
	{
	    // build the transaction presentation output
	    $result = ''; // start with an empty array
	    foreach ($histories as $history)
	    {
	        $result .= $this->parser->parse('onetransaction', (array) $history, true);
	    }
	    $this->data['display_transactions'] = $result;

        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'your user role is '. $role . '';
        if ($role == "boss") {
            $this->data['pagebody'] = 'transactionlist';
        } else {
            $this->data['pagebody'] = 'emptyforrole';
        }

	    // and then pass them on

	    $this->render();
	}
	// Extract & handle a page of items, defaulting to the beginning
  function page($num = 1)
  {
      $records = $this->histories->getAllTransactions(); // get all the histories
      $histories = array(); // start with an empty extract

      // use a foreach loop, because the record indices may not be sequential
      $index = 0; // where are we in the transaction list
      $count = 0; // how many items have we added to the extract
      $start = ($num - 1) * $this->items_per_page;
      foreach($records as $history) {
          if ($index++ >= $start) {
              $histories[] = $history;
              $count++;
          }
          if ($count >= $this->items_per_page) break;
      }
      $this->data['pagination'] = $this->pagenav($num);

      $this->show_page($histories);
  }

	function showSortedByPrice($order = 0)
	{
		if ($order == 0) {
			$records = $this->histories->sortedByPrice("asc"); // get all the histories
		} else {
			$records = $this->histories->sortedByPrice("desc"); // get all the histories
		}
		$histories = array(); // start with an empty extract
		$num = 1;
		// use a foreach loop, because the record indices may not be sequential
		$index = 0; // where are we in the transaction list
		$count = 0; // how many items have we added to the extract
		$start = ($num - 1) * $this->items_per_page;
		foreach($records as $history) {
				if ($index++ >= $start) {
						$histories[] = $history;
						$count++;
				}
				if ($count >= $this->items_per_page) break;
		}
		$this->data['pagination'] = $this->pagenav($num);

		$this->show_page($histories);
	}

	function showSortedByDateTime($order = 0)
	{
		if ($order == 0) {
			$records = $this->histories->sortedByDateTime("asc"); // get all the histories
		} else {
			$records = $this->histories->sortedByDateTime("desc"); // get all the histories
		}
		$histories = array(); // start with an empty extract
		$num = 1;
		// use a foreach loop, because the record indices may not be sequential
		$index = 0; // where are we in the transaction list
		$count = 0; // how many items have we added to the extract
		$start = ($num - 1) * $this->items_per_page;
		foreach($records as $history) {
				if ($index++ >= $start) {
						$histories[] = $history;
						$count++;
				}
				if ($count >= $this->items_per_page) break;
		}
		$this->data['pagination'] = $this->pagenav($num);

		$this->show_page($histories);
	}

	function showSortedByType($order = 0)
	{
		if ($order == 0) {
			$records = $this->histories->sortedByType("asc"); // get all the histories
		} else {
			$records = $this->histories->sortedByType("desc"); // get all the histories
		}
		$histories = array(); // start with an empty extract
		$num = 1;
		// use a foreach loop, because the record indices may not be sequential
		$index = 0; // where are we in the transaction list
		$count = 0; // how many items have we added to the extract
		$start = ($num - 1) * $this->items_per_page;
		foreach($records as $history) {
				if ($index++ >= $start) {
						$histories[] = $history;
						$count++;
				}
				if ($count >= $this->items_per_page) break;
		}
		$this->data['pagination'] = $this->pagenav($num);

		$this->show_page($histories);
	}

	// Build the pagination navbar
  private function pagenav($num) {
      $lastpage = ceil($this->histories->size() / $this->items_per_page);
      $parms = array(
          'first' => 1,
          'previous' => (max($num-1,1)),
          'next' => min($num+1,$lastpage),
          'last' => $lastpage
      );
      return $this->parser->parse('historynav',$parms,true);
  }

}
