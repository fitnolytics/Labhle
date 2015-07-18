<?php 
$num_rec_per_page=3;
include 'db.php';
$connectionStatu = connect_db();
$page = (isset($_GET["page"]) ? $_GET["page"] : 1);
$start_from = ($page-1) * $num_rec_per_page;
$query = "SELECT * FROM users order by id LIMIT $start_from, $num_rec_per_page";
$result = mysqli_query ($connectionStatu, $query); //run the query
?>

<table>
	<tr><td>ID</td><td>Username</td><td>Email</td><td>Address</td></tr>

<?php 
	while ($row = mysqli_fetch_assoc($result)) { 
?>

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['address']; ?></td>
		</tr>

<?php 
	};
?>

</table>

<?php
$query2 = "SELECT `id` FROM users"; 
$result2 = mysqli_query($connectionStatu, $query2); //run the query
echo $total_records = mysqli_num_rows($result2);  //count number of records
echo $total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='test_pagination.php?page=1'>".'|<'."</a>"; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='test_pagination.php?page=".$i."'>".$i."</a> "; 
};
echo "<a href='test_pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>