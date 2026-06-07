<?= $this->extend("layout/sablona"); ?>

<?= $this->section("title"); ?>
    <title>Steam Database</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>

<div class="container-fluid">
    <div class="offset-3 col-6">
     <h1 class="my-3">Login</h1>
      <form action="<?= base_url('login') ?>" method="post">
        <!-- <div class="mb-3 mt-3 form-floating">
          <input type="text" class="form-control" placeholder="username" id="username" name="username" required>
          <label for="username"><i class="fa-regular fa-user"></i> Username:</label>
        </div> -->

        <div class="mb-3 mt-3 form-floating">
          <input type="text" class="form-control" placeholder="Email" id="email" name="email" required>
          <label for="email"><i class="fa-regular fa-envelope"></i> Email:</label>
        </div> <!-- email jestli chceme udělat to přihlášení na jedno pomocí username i emailu?? => případně to udělat na přepínání? --> 
       <div class="mb-3 mt-3 form-floating">
          <input type="password" class="form-control" placeholder="Heslo" id="password" name="password" minlength="8" required>
          <label for="password"><i class="fa-solid fa-lock"></i> Heslo:</label>
        </div>

        <div>
            <p>Don't have an account? <a><?= anchor("register", "Register here!")?></a></p> <!-- jestli teda registraci dělat chceme? nikde v zadání jsem to nenašla, tak asi nemusíme idk-->
        </div>

        <a href="#"><button type="submit" class="btn btn-success">Login</button></a>
      </form> 

      <?php
    if(isset($alert)) {
      $this->include('Layout/alert');
    }


  ?>
  

 <!-- <?php
    echo form_open("login");
  ?>
  <div class="input-group mb-3">
  <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
    <div class="form-floating">       
        <input class="form-control" type="text" name="login" id="login" placeholder="a"/>
        <label for="login" class="form-label">Přihlašovací jméno</label>
    </div>
    
</div>
<div class="input-group mb-3">
<span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
    <div class="form-floating">       
        <input class="form-control" type="password" name="password" id="password" placeholder="a"/>
        <label for="password" class="form-label">Heslo</label>
    </div>
</div>
<button class="btn btn-primary" type="submit">Přihlásit</button>
    </div>
</div>
 -->



<?=$this->endSection();?>