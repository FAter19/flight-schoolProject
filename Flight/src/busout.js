

var settings = {
               rows: 4,
               cols: 3,
               rowCssPrefix: 'row-',
               colCssPrefix: 'col-',
               seatWidth: 70,
               seatHeight: 70,
               seatCss: 'seat',
               selectedSeatCss: 'selectedSeat',
               selectingSeatCss: 'selectingSeat'
           };


var init = function (reservedSeat) {
                var str = [], seatNo, className;
                for (i = 0; i < settings.cols; i++) {
                    for (j = 0; j < settings.rows; j++) {
                        seatNo = (i + j * settings.cols + 1);
                        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                        if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                            className += ' ' + settings.selectedSeatCss;
                        }
                        if (seatNo !== 3) {
                            str.push('<div value="' + seatNo + '" class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                  '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</div>');
                        }
                        if (seatNo[2] == 3) {
                            str.push('<div  class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                //   '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</div>');
                        }
                    }
                }

                
                $('.place').html(str.join(''));
            };
            //case I: Show from starting
            //init();
 
            //Case II: If already booked
            var bookedSeats = [3];
           
            init(bookedSeats);


$('.' + settings.seatCss).click(function () {
if ($(this).hasClass(settings.selectedSeatCss)){
    alert('This seat is already reserved');
}
else{
    $(this).toggleClass(settings.selectingSeatCss);
    }
});
 
$('.seat').click(function () {
    // console.log('happy')
    var str = [];
    $.each($('.place div.' + settings.selectedSeatCss + ' a, .place div.'+ settings.selectingSeatCss + ' a'), function (index, value) {
        str.push($(this).attr('title'));
    });
    document.getElementById('seats').value = str.join(' , ');
    // alert(str.join(' , '));
    var seat = document.getElementById('seats'); 
    // console.log(str.length);
    document.getElementById('tickets').value = parseInt(str.length);
    console.log(document.getElementById('tickets').value = parseInt(str.length));

    
})
 
// $('.btnShowNew').click(function () {
//     var str = [], item;
//     $.each($('.place div.' + settings.selectingSeatCss + ' a'), function (index, value) {
//         item = $(this).attr('title');                   
//         str.push(item);                   
//     });
//     alert(str.join(' , '));
// })

// document.getElementById('place').innerHTML= settings;

// var seat = document.getElementsByClassName('seat');

function seat() {
    console.log('happy');
    
}

