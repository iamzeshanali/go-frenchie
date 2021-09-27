<div class="gf-dashboard-content col-xl-10 col-lg-9">
    <div class="container-fluid p-0">
{{--        <div class="table-responsive">--}}
{{--            <div class="table-wrapper">--}}
{{--                <div class="table-title">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-7">--}}
{{--                            <h2>Manage Listings</h2>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-5">--}}
{{--                            <a href="#addListingModal" class="gf-btn-light float-right" data-toggle="modal">--}}
{{--                            <i class="fas fa-plus"></i> <span>Add New Listing</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <table class="bd-content-table table table-striped table-hover">--}}
{{--                    <thead>--}}
{{--                        <tr>--}}
{{--                            <th>--}}
{{--                                <span class="custom-checkbox">--}}
{{--                                    <input type="checkbox" id="selectAll">--}}
{{--                                    <label for="selectAll"></label>--}}
{{--                                </span>--}}
{{--                            </th>--}}
{{--                            <th>Title</th>--}}
{{--                            <th>Sex</th>--}}
{{--                            <th>Image</th>--}}
{{--                            <th>Actions</th>--}}
{{--                        </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <span class="custom-checkbox">--}}
{{--                                    <input type="checkbox" id="checkbox" name="options[]" value="1">--}}
{{--                                    <label for="checkbox"></label>--}}
{{--                                </span>--}}
{{--                            </td>--}}
{{--                            <td>Martin Blank</td>--}}
{{--                            <td>Male</td>--}}
{{--                            <td><img src="images/1.png" alt="" width="60px"></td>--}}
{{--                            <td>--}}
{{--                                <a href="" class="view"><i class="fas fa-eye"></i></a>--}}
{{--                                <a href="#editListingModal" class="edit" data-toggle=""><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                <a href="#deleteListingModal" class="delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--                <div class="gf-dashboard-table-footer d-flex justify-content-between align-items-center clearfix">--}}
{{--                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item disabled"><a href="#">Previous</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                        <li class="page-item active"><a href="#" class="page-link">3</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">4</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">5</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">Next</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div id="deleteListingModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Listing</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="gf-btn-light" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="gf-btn-dark" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
