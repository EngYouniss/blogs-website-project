<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Sidebar (Profile Info) -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle border mb-3" width="120" alt="Profile">
                    <h4 class="card-title">John Doe</h4>
                    <p class="text-muted">@johndoe</p>
                    <p class="text-muted">Full-Stack Developer | Open Source Contributor</p>
                    <button class="btn btn-primary btn-sm w-100">Follow</button>
                </div>
            </div>

            <!-- User Stats -->
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <p><strong>Repositories:</strong> 34</p>
                    <p><strong>Followers:</strong> 2.5K</p>
                    <p><strong>Following:</strong> 120</p>
                    <p><strong>Location:</strong> San Francisco, CA</p>
                    <p><strong>Website:</strong> <a href="#">johndoe.com</a></p>
                </div>
            </div>
        </div>

        <!-- Main Content (Repositories & Activity) -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4>Repositories</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">Portfolio Website</h5>
                                <small class="text-muted">HTML, CSS, JavaScript</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">⭐ 1.2K</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">To-Do App</h5>
                                <small class="text-muted">React, Node.js</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">⭐ 840</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">API Boilerplate</h5>
                                <small class="text-muted">Express, MongoDB</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">⭐ 600</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h4>Recent Activity</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-code-branch text-success"></i> Pushed to <strong>portfolio-website</strong>
                            <span class="text-muted float-end">3 hours ago</span>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-star text-warning"></i> Starred <strong>react-dashboard</strong>
                            <span class="text-muted float-end">1 day ago</span>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user-plus text-info"></i> Followed <strong>@techguy</strong>
                            <span class="text-muted float-end">2 days ago</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
