<!DOCTYPE html>

<?php
	//define variable names for later use
	$servername = "localhost";
	$username = "adam";
	$password = "password";
	$dbname = "Bookstore";
	
	//db will connect to server or print error message
	$conn = new mysqli($servername, $username, $password, $dbname);
	$db = mysqli_connect($servername, $username, $password, $dbname) or die('Error connecting to MySQL server.');
?>

<html lang = "en">
	<head>
		<meta charset="UTF-8">
		<title>Database Assignment 7</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style>
			body{background-color: linen;}
			
			id, button {font-size: 2em;}
			#runQ1, #runQ2, #runQ3 #runQ4 #runQ5 {font-size: 2em;}
			table.hidden {
				display: none;
				background-color: white;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			th, td {padding: 5px;}
			th {background-color: #e2c96e;}
			tr:hover {background-color: #c0c0c0;}
			
			button, #runQ1, #runQ2, #runQ3 #runQ4 #runQ5 {
				border-radius: 28px;
				font-family: Arial;
				color: #ffffff;
				font-size: 20px;
				background: #3498db;
				padding: 10px 20px 10px 20px;
				text-decoration: none;
				margin:20px;
 
			}

			button:hover, #runQ1:hover, #runQ2:hover, #runQ3:hover #runQ4:hover #runQ5:hover {
				background: #3cb0fd;
				text-decoration: none;
			}
		</style>
	</head>

	<body>
	
		<h1>471Books</h1>
		
			<form id="tableButton1" action="" method="post">
				<input type="submit" name="runQ1" id="runQ1" value="Book Table Query"/>
			</form>
			
			<table id="table1" style="display: hidden">
				<tr>
					<th><u>ISBN</u></th>
					<th><u>Title</u></th>
                    <th><u>AuthorID</u></th>
                    <th><u>PublisherID</u></th>
                    <th><u>Year_Published</u></th>
                    <th><u>Price</u></th>
                    <th><u>Description</u></th>
                    <th><u>Genre</u></th>
                    <th><u>Type</u></th>
                    <th><u>Condition</u></th>
                    <th><u>numOfPages</u></th>
                    <th><u>Language</u></th>
                    <th><u>Weight</u></th>
                    <th><u>productDimiensions</u></th>
                    <th><u>Review</u></th>
				</tr>
			
			<?php
			
				function runQ1($conn){
					
					//test connection
					if ($conn->connect_error){
						die("connection failed: " . $conn->connect_error);
					}
					
					$sql = "SELECT *
					        FROM BOOKS";

					$result = $conn->query($sql);
				
					if ($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
			?>
								<tr>
									<td><?php echo $row['ISBN']?></td>
									<td><?php echo $row['Title']?></td>
                                    <td><?php echo $row['authorID']?></td>
                                    <td><?php echo $row['PublisherID']?></td>
                                    <td><?php echo $row['Year_Published']?></td>
                                    <td><?php echo $row['Price']?></td>
                                    <td><?php echo $row['Book_Description']?></td>
                                    <td><?php echo $row['Genre']?></td>
                                    <td><?php echo $row['FormatType']?></td>
                                    <td><?php echo $row['BookCondition']?></td>
                                    <td><?php echo $row['numOfPages']?></td>
                                    <td><?php echo $row['Written_Language']?></td>
                                    <td><?php echo $row['Product_Weight']?></td>
                                    <td><?php echo $row['productDimiensions']?></td>
                                    <td><?php echo $row['Reviews']?></td>
								</tr>
							<?php
						}
					}else {
						echo "0 results";
					}
					
					mysqli_close($conn);
				}	

				if (array_key_exists('runQ1',$_POST)){
					runQ1($conn);
				}	
			?>		
			</table><br>
			
			<form id="tableButton2" action="" method="post">
				<input type="submit" name="runQ2" id="runQ2" value="Author Table Query"/>
			</form>
			
			<table id="table2" style="display: hidden">
				<tr>
					<th><u>AuthorID</u></th>
					<th><u>authorFirstName</u></th>
                    <th><u>authorLastName</u></th>
                    <th><u>ISBN</u></th>
				</tr>
			
			<?php
				function runQ2($conn){

					if ($conn->connect_error){
						die("connection failed: " . $conn->connect_error);
					}
					
					$sql = "SELECT *
					        FROM AUTHORS";
					
					$result = $conn->query($sql);
						
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){				
							?>
								<tr>
									<td><?php echo $row['authorID']?></td>
									<td><?php echo $row['authorFirstName']?></td>
                                    <td><?php echo $row['authorLastName']?></td>
                                    <td><?php echo $row['ISBN']?></td>
								</tr>
							<?php
						}
					}else {
						echo "0 results";
					}
					
					mysqli_close($conn);
				}
			
				if (array_key_exists('runQ2',$_POST)){
					runQ2($conn);
				}
			?>	
			</table><br>

		<button id="tableButton3" type="button">Admin Book Form</button><br>
			<form  action="" method="post" id="q3" style="display: none">
				<b>ISBN:</b><input type="number" ISBN="$userISBN" name = "userISBN" value="('ISBN Number')"/><br>
                <b>Title:</b><input type="text" Title="$userTitle" name = "userTitle" value="('Book Title')"/><br>
                <b>PublisherID:</b><input type="text" PublisherID="$userPublisherID" name = "userPublisherID" value="('Publishers ID')"/><br>
                <b>Year Published:</b><input type="number" Year_Published="$userYear_Published" name = "userYear_Published" value="('Year Published')"/><br>
                <b>Price:</b><input type="number" Price="$userPrice" name = "userPrice" value="('Price of the Book')"/><br>
                <b>Book Description:</b><input type="text" Book_Description="$userDescription" name = "userDescription" value="('Book Description')"/><br>
                <b>Genre:</b><input type="text" Genre="$userGenre" name = "userGenre" value="('Book Genre')"/><br>
                <b>Format Type:</b><input type="text" FormatType="$userType" name = "userType" value="('Hardback, Paperback, or eBook')"/><br>
                <b>Condition:</b><input type="text" BookCondition="$userCondition" name = "userCondition" value="('New or Used')"/><br>
                <b>Number of Pages:</b><input type="number" numOfPages="$userPages" name = "userPages" value="('Number of Pages')"/><br>
                <b>Written Language:</b><input type="text" Written_Language="$userLanguage" name = "userLanguage" value="('Language of the Book')"/><br>
                <b>Product Weight:</b><input type="number" Product_Weight="$userWeight" name = "userWeight" value="('Weight of the Book')"/><br>
                <b>Product Dimiensions:</b><input type="text" productDimiensions="$userDimiensions" name = "userDimiensions" value="('Length by Width by Height')"/><br>
                <b>Reviews:</b><input type="text" Reviews="$userReview" name = "userReview" value="('Book Review')"/><br>
				<input type="submit" name="runQ3" id = "runQ3"/>
			</form>
			
			<table id="table" style="display: hidden">
			
			<?php 
				
				function runQ3($conn){	

					//test connection
					if ($conn->connect_error){
						die('connection failed: ' . $conn->connect_error);
					}
					
						$userISBN = $_POST['userISBN'];
						$userTitle = $_POST['userTitle'];
						$userPublisherID = $_POST['userPublisherID'];
						$userYear_Published = $_POST['userYear_Published'];
						$userPrice = $_POST['userPrice'];
						$userBook_Description = $_POST['userDescription'];
						$userGenre = $_POST['userGenre'];
						$userType = $_POST['userType'];
						$userCondition = $_POST['userCondition'];
						$userPages = $_POST['userPages'];
						$userLanguage = $_POST['userLanguage'];
						$userWeight = $_POST['userWeight'];
						$userDimiensions = $_POST['userDimiensions'];
						$userReview = $_POST['userReview'];
					
						$sql = "INSERT IGNORE INTO BOOKS (ISBN, Title, PublisherID, Year_Published, Price, Book_Description, 
											Genre, FormatType, BookCondition, numOfPages, Written_Language, Product_Weight, 
											productDimiensions, Reviews)
								VALUES ($userISBN, $userTitle, $userPublisherID, $userYear_Published, $userPrice, 
										$userBook_Description, $userGenre, $userType, $userCondition, $userPages, 
										$userLanguage, $userWeight, $userDimiensions, $userReview)";
						
						if ($conn->query($sql) === TRUE){
							echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
						}else {
							echo "<script>alert('FAILED TO INSERT');</script>";
						}	

					mysqli_close($conn);
				}
				
				if (array_key_exists('runQ3',$_POST)){
					runQ3($conn);
				}	
			?>
			</table>

            <button id="tableButton4" type="button">ISBN Query</button><br>
			<form  action="" method="post" id="q4" style="display: none">
				<b>ISBN:</b><input type="text" ISBN="$userISBN" name = "userISBN" value="('ISBN')"/><br>
				<input type="submit" name="runQ4" id = "runQ4"/>
			</form>
			
			<table id="table" style="display: hidden">
				<tr>
					<th><u>ISBN</u></th>
					<th><u>authorID</u></th>
                    <th><u>authorFirstName</u></th>
                    <th><u>authorLastName</u></th>
				</tr>
			
			<?php 
				
				function runQ4($conn){	

					//test connection
					if ($conn->connect_error){
						die("connection failed: " . $conn->connect_error);
					}
                    
                    $userISBN = $_POST['userISBN'];
				
					$sql = "SELECT BOOKS.ISBN, AUTHORS.authorID, AUTHORS.authorFirstName, AUTHORS.authorLastName
                            FROM BOOKS, AUTHORS
							WHERE BOOKS.ISBN = $userISBN
								AND AUTHORS.ISBN = $userISBN";
						
					$result = $conn->query($sql);
					
					if (!empty($result) && $result->num_rows > 0){
						while ($row = $result->fetch_assoc()){		
							?>
								<tr>
                                    <td><?php echo $row['ISBN']?></td>
									<td><?php echo $row['authorID']?></td>
									<td><?php echo $row['authorFirstName']?></td>
                                    <td><?php echo $row['authorLastName']?></td>
								</tr>
							<?php
						}
					}else {
						echo "0 results";
                    }

					mysqli_close($conn);
				}
				
				if (array_key_exists('runQ4',$_POST)){
					runQ4($conn);
				}	
			?>
			</table>

            <button id="tableButton5" type="button">Admin Author Form</button><br>
			<form  action="" method="post" id="q5" style="display: none">
                <b>ISBN:</b><input type="number" ISBN="$userISBN" name = "userISBN" value="('ISBN Number')"/><br>
                <b>AuthorID:</b><input type="text" authorID="$userAuthorID" name = "userAuthorID" value="('Authors ID')"/><br>
                <b>Author First Name:</b><input type="text" authorFirstName="$userAuthorFName" name = "userAuthorFName" value="('Authors First Name')"/><br>
                <b>Author Last Name:</b><input type="text" authorLastName="$userAuthorLName" name = "userAuthorLName" value="('Authors Last Name')"/><br>
                <input type="submit" name="runQ5" id = "runQ5"/>
            </form>

            <table id="table" style="display: hidden">

                <?php 
                    
                function runQ5($conn){	

                    //test connection
                    if ($conn->connect_error){
                        die("connection failed: " . $conn->connect_error);
                    }

                    $userISBN = $_POST["userISBN"];
                    $userAuthorID = $_POST["userAuthorID"];
                    $userAuthorFName = $_POST["userAuthorFName"];
                    $userAuthorLName = $_POST["userAuthorLName"];

                    $sql = "INSERT INTO AUTHORS (ISBN, authorID, authorFirstName, authorLastName)
                            VALUES ($userISBN, $userAuthorID, $userAuthorFName, $userAuthorLName)";
							
					$sql2 = "UPDATE BOOKS SET BOOKS.authorID=$userAuthorID WHERE BOOKS.ISBN=$userISBN";

							if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
								echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
							}else {
								echo "<script>alert('FAILED TO INSERT');</script>";
							}

                    mysqli_close($conn);
                }
                    
                    if (array_key_exists('runQ5',$_POST)){
                        runQ5($conn);
                    }	
                ?>
                
            </table>

            <script>
				
				$("#tableButton1").click(function(){
					$("#table1").slideToggle("slow");
				});
				$("#tableButton2").click(function(){
					$("#table2").slideToggle("slow");
				});
				$("#tableButton3").click(function(){
					$("#q3").slideToggle("slow");
				});
                $("#tableButton4").click(function(){
					$("#q4").slideToggle("slow");
				});
                $("#tableButton5").click(function(){
					$("#q5").slideToggle("slow");
				});
				
			</script>
	</body>
</html>