document.getElementById('btnPDF').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah submit form default
    window.location.href = "{{ route('kalkulator.exportPDF') }}";
});
