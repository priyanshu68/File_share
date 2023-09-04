<?php
        session_start();

        if(!isset($_SESSION["name"]))
        {
            header("Location: login.php");
        }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

 <div class="container-fluid">
    <div class="row">
        <!-- Sidebar (col-3) -->
        <nav class="col-2 sidebar">

            <h2 class="text-white text-center" > File Share</h2>
            <hr>


            <ul class="nav flex-column mt-5">
                <li class="nav-item  mt-4">
                    <a class="nav-link active sidebar-link text-white" href="#" data-option="dashboard-home">Dashboard</a>
                </li>
                <li class="nav-item  mt-4">
                    <a class="nav-link sidebar-link text-white" href="#" data-option="dashboard-upload">Upload File</a>
                </li>
                <li class="nav-item  mt-4">
                    <a class="nav-link sidebar-link text-white" href="#" data-option="dashboard-shared">Shared Files</a>
                </li>
                <!-- Add more sidebar links as needed -->
            </ul>

            
            <a href="logout.php" class="btn btn-warning logout">logout</a>
        </nav>
        

        <div class="col-10 dashboard">
        <div id="dashboard-home" class="dashboard-content">
                    <h2 class="p-4">Dashboard</h2>
                    <div class="container files">
                        <h3 class="p-2">My Files</h3>
                        
                        <div class="container">

                    
                            <table class="table">
                            <thead>
                            <th scope="col" class="col-1 text-center">Sl.No</th>
                            <th scope="col" class="col-6 text-center">Filename</th>
                            <th scope="col" class="col-5 text-center">Uploaded at</th>
                                
                                
                            </thead>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Upload File Section -->
                <div id="dashboard-upload" class="dashboard-content"  style="display: none;">
                    <h2 class="p-4">Upload File</h2>
                    <div class="container files">
                        <h3 class="p-2">Upload Files</h3>
                        <p>This is the upload file content. You can add more content here.</p>
                    </div>
                </div>

                <!-- Shared Files Section -->
                <div id="dashboard-shared" class="dashboard-content"  style="display: none;">
                    <h2 class="p-4">Shared Files</h2>
                    <div class="container files">
                        <h3 class="p-2">Shared Files</h3>
                        <p>This is the shared files content. You can add more content here.</p>
                    </div>
                </div>
            

        </div>
        
        

        
        
    </div>
 </div>




</body>
</html>