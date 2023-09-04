<footer>
  <div class="container w3ls-footer-grids pt-sm-4 pt-3">
    <div class="row">
      <div class="col-md-4">
        <h2 class="mb-sm-3 mb-2">
          <a href="index.php" class="text-white font-italic font-weight-bold">
            <span>Elderly & </span>Chronic Disease Information System 
            <!-- <i class="fas fa-syringe ml-2"></i> -->
          </a>
        </h2>
      </div>
      <div class="col-md-4">
      <h3 class="mb-sm-3 mb-2 text-white">Quick Links</h3>
            <div class="nav-w3-l">
              <ul class="list-unstyled">
                <li>
                  <a href="index.php" class="text-white">Home</a>
                </li>
                <li class="mt-2">
                  <a href="about.php" class="text-white">About Us</a>
                </li>
                <li class="mt-2">
                  <a href="contact.php" class="text-white">Contact Us</a>
                </li>
            
              </ul>
            </div>
      </div>
      <div class="col-md-4">
      <h3 class="mb-sm-3 mb-2 text-white">Address</h3>
        <?php
        $pagetype="contactus";
        $sql = "SELECT * from tblcontactusinfo";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $result){
            ?>
            <p class="text-white">
              <i class="fas fa-map-marker-alt mr-2"></i><?php  echo $result->Address; ?>
            </p>
            <p class="text-white">
                <i class="far fa-envelope-open mr-2"></i>
                <a href="mailto:info@example.com" class="text-white"><?php  echo $result->EmailId; ?></a>
            </p>
            <p class="text-white">
               <i class="fas fa-phone mr-2"></i>+<?php  echo $result->ContactNo; ?>
            </p>
                            
            <?php
          }   
        }
        ?>
      
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</footer>