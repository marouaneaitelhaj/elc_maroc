<div class="container d-flex justify-content-center align-items-center">
    <div class="container-fluid h-custom bg-light">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../app/views/home/images/addcategory.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 m-4 offset-xl-1">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal m-4">Add category</p>

                    </div>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" name="libelle" class="border form-control form-control-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Name of category</label>
                    </div>

                    <div class="form-outline mb-4">
                        <textarea class="w-100 border" placeholder="Description" name="description" id="" cols="" rows=""></textarea>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <input type="file" name="catPic">
                    </div>

                    


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="btn" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Add category</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>