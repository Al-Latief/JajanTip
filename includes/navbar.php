 <!-- Mulai Navbar -->
 <?php
    session_start(); // Pastikan session dimulai

    // Cek apakah pengguna sudah login
    $is_logged_in = isset($_SESSION['id_pengguna']); // Ganti dengan session yang sesuai
    $username = $is_logged_in ? $_SESSION['username'] : ''; // Ambil username jika sudah login
    ?>

 <!-- Mulai Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light fixed-top" aria-label="Thirteenth navbar example">
     <div class="container">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
             <a class="navbar-brand col-lg-3 me-0" href="">JajanTip.</a>
             <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="produk.php">Products</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact Me</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="about.php">About Me</a>
                 </li>
             </ul>
             <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                 <?php if ($is_logged_in): ?>
                     <!-- Dropdown untuk pengguna yang sudah login -->
                     <div class="dropdown">
                         <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                             <?php echo htmlspecialchars($username); ?>
                         </button>
                         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                             <li><a class="dropdown-item" href="edit.php">Setting</a></li>
                             <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                         </ul>
                     </div>
                 <?php else: ?>
                     <a href="login.php" class="btn btn-outline-light">Login Pengguna</a>
                 <?php endif; ?>
             </div>
         </div>
     </div>
 </nav>
 <!-- Akhir Navbar -->