<x-app-layout>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Datatable Search</h5>
                    <p class="text-sm mb-0">
                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm font-weight-normal">Tiger Nixon</td>
                                <td class="text-sm font-weight-normal">System Architect</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">61</td>
                                <td class="text-sm font-weight-normal">2011/04/25</td>
                                <td class="text-sm font-weight-normal">$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true
            });
        </script>
    @endpush
</x-app-layout>
