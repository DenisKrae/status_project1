@push('css')
<style>
    .severity-0 { background-color: green; }
    .severity-1 { background-color: yellow; }
    .severity-2 { background-color: red; }
</style>
@endpush

<div class="card-body">
    <h2>Wartungsseite</h2>
    <table class="table" id="wartung-seite">
        <thead>
            <tr>
                <th>URL der Seite</th>
                <th>Auftrag
                    <select id="auftrag-filter">
                        <option value="Stundenbasiert (monatliche Abrechnung)">Stundenbasiert (monatliche Abrechnung)</option>
                        <option value="Stundenbasiert (quartalweise Abrechnung)">Stundenbasiert (quartalweise Abrechnung)</option>
                        <option value="Pauschal mit Hosting(jährlich Abrechnung)">Pauschal mit Hosting(jährlich Abrechnung)</option>
                        <option value="Pauschal (jährliche Abrechnung)">Pauschal (jährliche Abrechnung)</option>
                    </select>
                </th>
                <th>Core Version</th>
                <th>Module</th>
                <th>Core#</th>
                <th>Module#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allesSeitenURL as $key => $item)
            @php
                $url = $item['seite_url'];
                $json = file_get_contents($url);
                $data = json_decode($json, true);
                $module_severity_low = $module_severity_high = 0;
            @endphp
            <tr>
                <td>{{$url}}</td>
                <td>{{$item['auftrag']}}</td>
                <td class="severity-{{ $data['core']['severity'] ?? 'N/A' }}">
                    {{ $data['core']['installed_version'] ?? 'N/A' }} -> {{ $data['core']['latest_version'] ?? 'N/A' }}
                </td>
                <td>
                    <ul>  
                        @foreach ($data['modules'] ?? [] as $module => $details)
                            @if ($details['installed_version'] !== 'N/A' && $details['latest_version'] !== 'N/A' && $details['installed_version'] !== $details['latest_version'] && $details['installed_version'] !== '10.1.5' && $details['installed_version'] !== null)
                            @php
                                $severity = !empty($details['severity']) ? $details['severity'] : null;
                                $module_severity_low += ($severity === 1) ? 1 : 0;
                                $module_severity_high += ($severity === 2) ? 1 : 0;
                            @endphp
                            <li class="severity-{{ $details['severity'] ?? 'N/A' }}">
                                    {{ $module }}: {{ $details['installed_version'] }} -> {{ $details['latest_version'] }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                <td class="severity-0">{{ $data['core']['severity'] == 2 ? 1 : 0 }} </td>
                <td class="severity-1">{{ ($module_severity_high >= $module_severity_low) ? $module_severity_high : $module_severity_low }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
            
@push('scripts')
<script>
    $(document).ready(function () {

        // Initialize DataTable with Yajra
        var table = $('#wartung-seite').DataTable({
            "paging": true,
            "pageLength": 3,
            "lengthChange": false,
            "scrollX": false,
            "scrollCollapse": false,
            // "scrollY": '200px',
            "autoWidth": true,
            "searching": true,
            "order": [[4, 5, 'desc']],
            "info": false,
            'columnDefs': [ {
                'targets': [1], /* column index */
                'orderable': false, /* true or false */
            }],
        });

        // Add event listener to the dropdown for sorting
        $('#auftrag-filter').on('change', function() {
            var selectedValue = $(this).val().trim();
            var columnToSort = 0; // The column index to sort

            // Clear the search filter for the entire table
            table.search('').draw();

            // Use DataTables API to change the sorting order
            table.order([[columnToSort, selectedValue]]);
        });        

        // Hide the success message after 5000 milliseconds (5 seconds)
        setTimeout(function () {
            $("#success-message").fadeOut("slow");
        }, 5000);
    });
</script>
@endpush

