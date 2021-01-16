<footer class="section footer-classic context-dark bg-image" style="background: rgb(46, 46, 84); padding-top: 20px; margin-top: 30px;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4"></a>
                    <p>Perfectos is a data mining based online shopping site.The goal of the site is giving best product for best customer.</p>
                    <!-- Rights-->
                    <p class="rights"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved.</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Contacts</h5>
                <dl class="contact-list">
                    <dt>Address:</dt>
                    <dd>123 South Abc Avenue, Abc, xyz</dd>
                </dl>
                <dl class="contact-list">
                    <dt>Email:</dt>
                    <dd><a href="mailto:#">helpcenter@perfectos.com</a></dd>
                </dl>
                <dl class="contact-list">
                    <dt>Phones:</dt>
                    <dd><a href="tel:#">9826910</a> <span>or</span> <a href="tel:#">82654278</a>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5>PERFECTOS</h5>
                <ul class="nav-list">
                    <li><a href="#">About Perfetcos</a></li>
                    <li><a href="#">Perfectos Blog</a></li>
                    <li><a href="#">Our Vendors</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row no-gutters social-container">
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
    </div>
</footer>
<!-- Footer -->
<!-- LOGIN Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">LOGIN TO PREFECTOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="input">Username/Email</label>
                    <input type="email" class="form-control input" id="username" aria-describedby="emailHelp" name="username">
                </div>
                <div class="form-group">
                    <label class="input">Password</label>
                    <input type="password" class="form-control input" id="password" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" id="login">LOGIN</button>
            </div>
        </div>
    </div>
</div>
<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">CREATE NEW ACCOUNT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Middlename</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="contact" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Gender</label>
                        <select id="gender" class="form-control" name="gender" required>
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="givepassword" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, or floor" name="address2">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="state" class="form-control" name="state" required>
                            <option selected>Choose...</option>
                            <option>Dhaka</option>
                            <option>Chittagong</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" id="signup">SIGNUP</button>
            </div>
        </div>
    </div>
</div>
<!-- /signup Modal -->
<!-- /recommendation Modal -->
<div class="modal fade" id="giftrecommendationModal" tabindex="-1" role="dialog" aria-labelledby="giftrecommendationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="giftrecommendationModalLabel">GIFT RECOMMENDER 2.0</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <input type="hidden" value="<?=$_SESSION['cust_id'];?>" id="userid"> -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="age">Choose age:</label>
                        <select name="age" class="form-control" id="age">
                            <option selected>Choose...</option>
                            <option value="1">13-19</option>
                            <option value="2">20-25</option>
                            <option value="3">26-32</option>
                            <option value="4">33-45</option>
                            <option value="5">46-50</option>
                            <option value="6">51-60</option>
                            <option value="7">61-80</option>
                            <option value="8">81-100</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="occupation">Choose occupation:</label>
                        <select name="occupation" class="form-control" id="occupation">
                            <option selected>Choose...</option>
                            <option value="1">student</option>
                            <option value="2">teacher</option>
                            <option value="3">housewife</option>
                            <option value="4">househusband</option>
                            <option value="5">businessman</option>
                            <option value="6">doctor</option>
                            <option value="7">engineer</option>
                            <option value="8">police officer</option>
                            <option value="9">military</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="marital_status">Choose marital status:</label>
                        <select name="marital_status" class="form-control" id="marital_status">
                            <option selected>Choose...</option>
                            <option value="1">single</option>
                            <option value="2">married</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Gender</label>
                        <select id="gender" class="form-control" name="gender" id="gender">
                            <option selected>Choose...</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="color">Choose color:</label>
                        <select name="color" class="form-control" id="color">
                            <option selected>Choose...</option>
                            <option value="1">white</option>
                            <option value="2">red</option>
                            <option value="3">pink</option>
                            <option value="4">blue</option>
                            <option value="5">purple</option>
                            <option value="6">green</option>
                            <option value="7">yellow</option>
                            <option value="8">black</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="occasion">Choose occasions:</label>
                        <select name="occasion" class="form-control" id="occasion">
                            <option selected>Choose...</option>
                            <option value="1">birthday</option>
                            <option value="2">weddings</option>
                            <option value="3">anniversary</option>
                            <option value="4">graduation</option>
                            <option value="5">promotion</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sport">Choose sports:</label>
                    <select name="sport" class="form-control" id="sport">
                        <option selected>Choose...</option>
                        <option value="1">cricket</option>
                        <option value="2">football</option>
                        <option value="3">soccer</option>
                        <option value="4">basketball</option>
                        <option value="5">hockey</option>
                        <option value="6">tennis</option>
                        <option value="7">golf</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="recommendation">GET RECOMMENDATION</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /recommendation Modal -->
<!-- Optional JavaScript -->
<script src="javascript/ajax.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
