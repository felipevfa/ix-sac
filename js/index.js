// ====================================
//               ABOUT
// ====================================

$('#show').click(function (event) {
    $('#more').addClass('active');
    $('#hide').addClass('active');
    $('#show').addClass('hidden'); 
});

$('#hide').click(function (event) {
    $('#hide').removeClass('active');
    $('#more').removeClass('active');
    $('#show').removeClass('hidden');
});