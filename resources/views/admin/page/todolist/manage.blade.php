<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
   @include('admin.page.todolist.head-css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
    @include('admin.share.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
   @include('admin.share.left-menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">
                                    Add Task
                                </button>
                            </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <i data-feather="mail" class="font-medium-3 me-50"></i>
                                        <span class="align-middle"> My Task</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i data-feather="star" class="font-medium-3 me-50"></i> <span class="align-middle">Important</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i data-feather="check" class="font-medium-3 me-50"></i> <span class="align-middle">Completed</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i data-feather="trash" class="font-medium-3 me-50"></i> <span class="align-middle">Deleted</span>
                                    </a>
                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Tags</h6>
                                    <i data-feather="plus" class="cursor-pointer"></i>
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary me-1"></span>Team
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success me-1"></span>Low
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-warning me-1"></span>Medium
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-danger me-1"></span>High
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-info me-1"></span>Update
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ms-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        <input type="text" class="form-control" id="todo-search" placeholder="Search task" aria-label="Search..." aria-describedby="todo-search" />
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle hide-arrow me-1" id="todoActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="todoActions">
                                        <a class="dropdown-item sort-asc" href="#">Sort A - Z</a>
                                        <a class="dropdown-item sort-desc" href="#">Sort Z - A</a>
                                        <a class="dropdown-item" href="#">Sort Assignee</a>
                                        <a class="dropdown-item" href="#">Sort Due Date</a>
                                        <a class="dropdown-item" href="#">Sort Today</a>
                                        <a class="dropdown-item" href="#">Sort 1 Week</a>
                                        <a class="dropdown-item" href="#">Sort 1 Month</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <li class="todo-item">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1" />
                                                        <label class="form-check-label" for="customCheck1"></label>
                                                    </div>
                                                    <span class="todo-title">Fix Responsiveness for new structure 💻</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper me-1">
                                                    <span class="badge rounded-pill badge-light-primary">Team</span>
                                                </div>
                                                <small class="text-nowrap text-muted me-1">Aug 08</small>
                                                <div class="avatar">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" alt="user-avatar" height="32" width="32" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <h5 class="modal-title">Add Task</h5>
                                            <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                                                <span class="todo-item-favorite cursor-pointer me-75"><i data-feather="star" class="font-medium-2"></i></span>
                                                <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            <div class="action-tags">
                                                <div class="mb-1">
                                                    <label for="todoTitleAdd" class="form-label">Title</label>
                                                    <input type="text" id="todoTitleAdd" name="todoTitleAdd" class="new-todo-item-title form-control" placeholder="Title" />
                                                </div>
                                                <div class="mb-1 position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Assignee</label>
                                                    <select class="select2 form-select" id="task-assigned" name="task-assigned">
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-3.jpg" value="Phill Buffer" selected>
                                                            Phill Buffer
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-1.jpg" value="Chandler Bing">
                                                            Chandler Bing
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-4.jpg" value="Ross Geller">
                                                            Ross Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-6.jpg" value="Monica Geller">
                                                            Monica Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-2.jpg" value="Joey Tribbiani">
                                                            Joey Tribbiani
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-11.jpg" value="Rachel Green">
                                                            Rachel Green
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="task-due-date" class="form-label">Due Date</label>
                                                    <input type="text" class="form-control task-due-date" id="task-due-date" name="task-due-date" />
                                                </div>
                                                <div class="mb-1">
                                                    <label for="task-tag" class="form-label d-block">Tag</label>
                                                    <select class="form-select task-tag" id="task-tag" name="task-tag" multiple="multiple">
                                                        <option value="Team">Team</option>
                                                        <option value="Low">Low</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="High">High</option>
                                                        <option value="Update">Update</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label">Description</label>
                                                    <div id="task-desc" class="border-bottom-0" data-placeholder="Write Your Description"></div>
                                                    <div class="d-flex justify-content-end desc-toolbar border-top-0">
                                                        <span class="ql-formats me-0">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                            <button class="ql-align"></button>
                                                            <button class="ql-link"></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-1">
                                                <button type="submit" id="addTask" class="btn btn-primary d-none add-todo-item me-1">Add</button>
                                                <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" id="updateTask" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
                                                <button type="button" id="deteleTask" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.share.footer')
    <!-- END: Footer-->

@include('admin.page.todolist.foot-css')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        $("#addTask").click(function(){
            var payload = {
                'title'          :   $("#todoTitleAdd").val(),
                'assignee'       :   $("#task-assigned").val(),
                'duedate'        :   $("#task-due-date").val(),
                'tag'            :   $("#task-tag").val(),
                'description'    :   $("#task-desc").val(),
            };
            console.log(payload);
            $.ajax({
                    url : '/admin/manage/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Added task successfully!");
                        }
                        // location.reload();
                    },
                    error: function($errors){
                        var listErrors = $errors.responseJSON.errors;
                        $.each(listErrors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
        });
    });
});
</script>
</body>
<!-- END: Body-->

</html>
