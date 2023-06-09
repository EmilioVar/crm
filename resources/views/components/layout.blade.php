<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- bootstrap table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>CRM</title>

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<!-- body -->
<body>
    <!-- navbar -->
    <x-nav-bar/>
    {{ $slot }}
    <!-- footer-->
    <x-footer/>
    <!-- scripts -->
    @livewireScripts
    <!-- fa icons -->
    <script src="https://kit.fontawesome.com/6ec5d09d9f.js" crossorigin="anonymous"></script>
    <!-- jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- datatables bootstrap -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @vite(['resources/js/app.js'])
    {{ $script ?? "" }}
</body>

</html>
