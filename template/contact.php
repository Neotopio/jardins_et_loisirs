<?php ob_start(); 
if (isset($_SESSION['sucess'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['sucess'] . "</div>";
    unset($_SESSION['sucess']);
} elseif (isset($_SESSION['error'])) {
    echo "<div class='alert alert-warning'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}?>
<div class="container  mb-5">
    <h1 class="title mb-5 mt-5">Contact</h1>
    <div class="row  cadre">
        <div class="col-lg-6 p-3  ">
            <form action="../controllers/contactMail.php" method="post">

                <div>
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control button " placeholder="" aria-label="Last name" name="last_name" required >
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                    <input type="text" class="form-control button" placeholder="" aria-label="First name" name="first_name"required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Téléphone</label>
                    <input type="number" class="form-control button" name="tel"required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control button"  placeholder="name@example.com" name="mail"required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control button"  rows="8" name="text"required></textarea>
                </div>
                <button class="btn btn-outline-dark button" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="col-lg-6 p-3 ">
            <div class="ratio ratio-1x1"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.1808180628673!2d7.349959815683711!3d49.12120097931422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47942df22be3c50b%3A0x787c812b8597e015!2sJardins%20%26%20Loisirs!5e0!3m2!1sfr!2sfr!4v1684241567401!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>