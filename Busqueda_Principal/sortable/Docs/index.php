<?
	include_once 'TableSorter.class.php';
	
	function returnGeoHtmlTableStr($whereClause='',$startingFromRecord=0,$rowsPerPage=100,$orderBy='city ASC')
	{
		mysql_connect('localhost','user','pass','db');
		mysql_select_db('db');
		
		$startingFromRecord = (int) $startingFromRecord;
		$rowsPerPage = (int) $rowsPerPage;
		
		$sql = "SELECT 
					count(*) as count 
				FROM 
					cnizz_geo 
					
				$whereClause
		
				";
		$result = mysql_query($sql);
		$countArr = mysql_fetch_assoc($result);
		$totalRows = $countArr['count'];
		
		if($orderBy==''){
			$orderBy='city ASC';
		}
		
		$sql = "SELECT SQL_CALC_FOUND_ROWS
					* 
				FROM 
					cnizz_geo 
					
				$whereClause
		
				ORDER BY 
					$orderBy
				LIMIT 
					$startingFromRecord,$rowsPerPage
				";
		$result = mysql_query($sql);
		$arr = array();
		while($row=mysql_fetch_assoc($result)){
			$arr[]=$row;
		}
		
		$sql = "SELECT FOUND_ROWS() as totalRows";
		$result = mysql_query($sql);
		$foundArr=mysql_fetch_assoc($result);
		
		$str = '
			<table class="DefaultTable" style="width:500px;">
			'.TableSorter::returnMetaStr($startingFromRecord,$rowsPerPage,$foundArr['totalRows'],count($arr),$orderBy).'
			<tr style="background:#FFF;"><td colspan="10" style="height:5px;">&nbsp;</td></tr>
			<tr id="GeoHead" class="DefaultTableHeader">
				<th id="City" title="'.(($orderBy=='city ASC')?'city DESC':'city ASC').'">City</th>
				<th id="State" title="'.(($orderBy=='state ASC')?'state DESC':'state ASC').'">State</th>
				<th id="Abbrev" title="'.(($orderBy=='state_abbrev ASC')?'state_abbrev DESC':'state_abbrev ASC').'">State</th>
				<th id="County" title="'.(($orderBy=='county ASC')?'county DESC':'county ASC').'">County</th>
			</tr>
			';
		$x=1;
		
		foreach($arr as $i)
		{
			if($x%2){
				$class='';
			}
			else{
				$class='zebra';
			}
			$str.= '<tr class="'.$class.'">
								<td><a id="'.$i['city'].'" title="'.stripslashes($i['city_id']).'">'.stripslashes($i['city']).'</a></td>
								<td>'.$i['state'].'</td>
								<td>'.$i['state_abbrev'].'</td>
								<td>'.$i['county'].'</td>
							</tr>';
			$x++;
		}
		
		$str.= '<tr style="background:#FFF;"><td colspan="10" style="height:5px;">&nbsp;</td></tr>';
		$str.=$meta.'</table>';
		return $str;		
	}
	
if($_GET['action']=='returnGeoHtmlTableStr'){
	die(returnGeoHtmlTableStr('',$_GET['start'],$_GET['rows'],$_GET['orderBy']));
}
else if($_GET['action']=='')
{
	
}

$pageTitle='Services &#187; ';
$headerStr='<script type="text/javascript" src="/js/mootools.1.2.1.core.js"></script>';

?>
<html>
<head>
<title>Table Sorter</title>
<link rel="stylesheet" media="screen" href="/mootools/table-sorter/table-sorter.css" />
<script type="text/javascript" src="/js/mootools1-2.js"></script>
<script type="text/javascript" src="/mootools/table-sorter/table-sorter.js"></script>
<script type="text/javascript">
	window.addEvent('domready',function(){
		sorter = new TableSorter({
			request: 'action', 
			action: 'returnGeoHtmlTableStr', 
			destination: 'XhrDump', 
			prev: 'PagePrev', 
			next: 'PageNext', 
			head: 'GeoHead',
			rows: 100 
		});
	})
</script>
</head>
<body>

		<h1>TableSorter Demo</h1>
		<p><a href="doc.php">Documentation</a> &nbsp;|&nbsp; 
		<a href="TableSorter.zip">Download</a></p>
		<pre>
	// sort data easily with just a few lines of code.
	// this example is running off the following
	
	window.addEvent('domready',function(){
		sorter = new TableSorter({
			request: 'action', 
			action: 'returnGeoHtmlTableStr', 
			destination: 'XhrDump', 
			prev: 'PagePrev', 
			next: 'PageNext', 
			head: 'GeoHead',
			rows: 100,
			startWait: "",
			endWait: ""
		});
	})
		</pre>
		<div id="XhrDump">
		<?=returnGeoHtmlTableStr();?>
		</div>
		<p><a href="/contact.php" />Contact me</a> to discuss your next project.</p>
</body>
</html>