<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="papers"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Papers"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">My Uploaded Papers</h6>
                                    
                                </div>
                            </div>
                            
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        
                                        @if (count($papers) > 0)
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Title</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Author</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Keywords</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Uploaded date</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($papers as $paper)

                                                <tr>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0"><h6>{{$paper->paper_title}}</h6></p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{$paper->co_authors}}</h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- <p class="text-xs font-weight-bold mb-0">Manager</p> -->
                                                        <p class="text-xs text-secondary mb-0">{{$paper->keywords}}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($paper->availability == 'public')
                                                            <span class="badge badge-sm bg-gradient-success">{{ $paper->availability}}</span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-secondary">{{ $paper->availability}}</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{$paper->created_at}}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="javascript:;"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <h3 class="text-xs text-center align-middle">No Papers Uploaded yet</h3>
                                        </tr>
                                        
                                        @endif
                                            
                                            
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                               
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
