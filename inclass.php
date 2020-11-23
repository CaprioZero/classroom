<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/fontawesome-free-5.11.2-web/css/all.css">
  <link rel="stylesheet" href="asset/css/style.css">
  

  <title>inClass</title>
</head>
<body>
<div class="background-inclass">
  <div class="top ">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fas fa-user"></i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-th"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Menu</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-plus"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Join a class</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Add a class</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </div>


  <div class="mid mg-t">
    <div class="container">
      <div class="row">

        <div class="col-md-8 col-xs-12 settings">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <h1 class="head"><i class="fas fa-briefcase"></i> WRITING PORTFOLIO 3</h1>
              <div class="sub-mid">
                <p class="teacher">Dung Cẩm Quang</p>
                <div class="day left">Oct 20 2020</div>
                <div class="deadline right">Oct 30 2020,11:59 PM</div>
              </div>
              <div class="form-group">
                <p>.</p>
              </div>
              <div class="form-group">
                <div class="class">
                  <p class="inclass">Hi all,

                    As assigned by the center, I am in charge of marking 1st-year students' code placement test. Hence, we are NOT going to have a class meeting on Monday, Oct 30th, 2020. 
                    When you're off from school, please try to finish the ELAB exercises.
                    See you!

                  </p>
                </div>
              </div>
              <div class="comment">
                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" id="comment"></textarea>
                  <button type="button" class="btn btn-warning mg-t"><i class="fab fa-telegram-plane"></i> Send</button>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-4 col-xs-12">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action oranges">
             <i class="fas fa-tasks"></i> Coming up
           </a>
           <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 title-news">Your work</h5>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <form>
                <p>Custom file:</p>
                <div class="custom-file mb-3">
                  <input type="file" class="custom-file-input" id="customFile" name="filename">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>

                <p>Default file:</p>
                <input type="file" id="myFile" name="filename2">

                <div class="mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </a>




        </div>
      </div>


      
      


    </div>
  </div>
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>