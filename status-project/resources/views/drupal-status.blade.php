<!DOCTYPE html>

<html>
<head>

    <title>All Sites</title>
    <style>
        .severity-0 { background-color: green; }
        .severity-1 { background-color: yellow; }
        .severity-2 { background-color: red; }
        /* Accordion Styles */
        .accordion-button {
            cursor: pointer;
        }
        .accordion-content {
            display: none;
        }
        .accordion-background {
            background-color: black;
        }


    </style>
</head>
<body>

    <h1>All Sites</h1>
    <h2>Wartungsseite</h2>

    <table border="1">
        <thead>
            <tr>
                <th>URL der Seite</th>
                <th>Auftrag</th>
                <th>Core Version</th>
                <th>Module</th>
            </tr>
        </thead>
        <tbody>
            @php
                $url = 'https://project.ddev.site/api/modules-themes';  // Ersetze dies durch die tatsächliche URL
            @endphp
            <tr>
                <td>{{ $url }}</td>
                <td></td>
                <td class="severity-{{ $data['core']['severity'] ?? 'N/A' }}">
                    {{ $data['core']['installed_version'] }} -> {{ $data['core']['latest_version'] }}
                </td>
                <td>
                    <div class="accordion">
                        @foreach ($data['modules'] as $module => $details)
                            @if ($details['installed_version'] !== 'N/A' && $details['latest_version'] !== 'N/A' && $details['installed_version'] !== $details['latest_version'] && $details['installed_version'] !== '10.1.5' && $details['installed_version'] !== null)
                                <div class="accordion-item severity-{{ $details['severity'] }}">
                                    <button class="accordion-button">
                                        {{ $module }} {{ $details['installed_version'] }} -> {{ $details['latest_version'] }}
                                    </button>
                                    <div class="accordion-content">
                                        <!-- Weitere Details zum Modul -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    <script>
        // Accordion-Funktionalität
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>

</body>
</html>
