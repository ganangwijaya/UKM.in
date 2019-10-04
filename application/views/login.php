<div class="badan" style="background-image: linear-gradient(120deg, #B55EBC 0%, #5B33A6 100%);background-size:cover;min-height:695px;padding-top:300px">
<div class="container">

    <div class="ke2">
    <?php echo validation_errors(); ?>
        <?php echo form_open('verifylogin'); ?>
        <input type="text" name="nim" placeholder="nim" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Login"/>
       </form>
    </div>

</div>
</div>