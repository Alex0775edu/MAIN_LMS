<?php
  include('sidebar.php');
?>
<main class="main-panel">
      <header class="topbar">
        <div><p class="mb-1">Enterprise control center</p><h1>Users</h1></div>
        <div class="topbar-actions">
          <label class="search-pill"><i class="fas fa-search"></i><input type="text" placeholder="Search admin workspace" data-search name="search_admin_workspace"></label>
          <button type="button" class="icon-btn" aria-label="Notifications"><i class="fas fa-bell"></i><span class="badge">4</span></button>
          <button type="button" class="icon-btn" aria-label="Toggle theme" data-theme-toggle><i class="fas fa-moon"></i></button>
          <div class="user-pill"><img src="https://i.pravatar.cc/100?img=15" alt="Admin avatar"><div><strong>Aditya Rajak</strong><small>Super Admin</small></div></div>
        </div>
      </header>
      <button class="btn btn-primary w-25"><a href="add_user.php">add User</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table>
    </main>
  </div>
  <?php
  include('footer.php');
  ?>




