<nav class="navbar navbar-expand-lg bg-primary sticky-top" data-bs-theme="dark">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <div class="mb-3 mt-3">
      <a class="nav-item me-3"><?= anchor("/", "<i class=\"fa-solid fa-igloo\"></i> Home", array('class' => 'fs-5 text-white text-decoration-none')); ?></a>
    </div>
  </div>
  <form method='get' action="search" id="searchForm">
    <div class= "row">
      <div class="col-md-6">
        <input type='text' class="form-control light" name='search' value='<?= isset($search) ? $search : '' ?>' placeholder="Search here...">
      </div>
      <div class="col-md-6">
        <input type='button' class="btn btn-outline-light" id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
      </div>
    </div>
  </form>
  <a class="nav-item" style="text-align: right;"><?= anchor("login", "User", array('class' => 'fs-5 text-white text-decoration-none me-3')); ?></a>
</nav>