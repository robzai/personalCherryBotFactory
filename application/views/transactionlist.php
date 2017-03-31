<h3>History</h3><hr/>
<ul class="nav nav-pills">
        <li><b>Sort By</b></li>
        <li><a href="/History/showSortedByType/0">Type( ↓ )</a></li>
        <li><a href="/History/showSortedByType/1">Type( ↑ )</a></li>
        <li><a href="/History/showSortedByDateTime/0">Date/Time( ↓ )</a></li>
        <li><a href="/History/showSortedByDateTime/1">Date/Time( ↑ )</a></li>
        <li><a href="/History/showSortedByPrice/0">Price( ↓ )</a></li>
        <li><a href="/History/showSortedByPrice/1">Price( ↑ )</a></li>
</ul><br/>
<table class="table sortable">
    <thead>
      <tr>
        <th>Transaction ID</th>
        <th>Type</th>
				<th>Type of Parts</th>
        <th>Date</th>
        <th>Price ($)</th>
      </tr>
    </thead>
    <tbody>
    {display_transactions}
    </tbody>
  </table>
  {pagination}
