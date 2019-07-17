<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flight</title>
</head>
<body>
    
<script>
    var price = 0; //price
var $cart = $('#selected-seats'); //Sitting Area
var $counter = $('#counter'); //Votes
var $total = $('#total'); //Total money

var sc = $('#seat-map').seatCharts({
    map: [  //Seating chart
        'aaaaaaaaaa',
                'aaaaaaa__a',
                'aaaaaaaaaa',
                'aaaaaaaaaa',
        'aaaaaaabbb'
    ],
    naming : {
        top : true,
        rows: ['A','B','C','D','E'],
        getLabel : function (character, row, column) {
            return column;
        }
    },
    seats:{
        a:{
            price: 99.9
        },
        b:{
            price: 200
        }
    },
    legend : { //Definition legend
        node : $('#legend'),
        items : [
            [ 'a', 'available',   'Option' ],
            [ 'a', 'unavailable', 'Sold']
        ]
    },
    click: function () { //Click event
        if (this.status() == 'available') { //optional seat
            var maxSeats = 3;
            var ms = sc.find('selected').length;
            //alert(ms);
            if (ms < maxSeats) {

                price = this.settings.data.price;



        $('<option selected>R'+(this.settings.row+1)+' S'+this.settings.label+'</option>')
                    .attr('id', 'cart-item-'+this.settings.id)
                    .attr('value', this.settings.id)
                    .attr('alt', price)
                    .data('seatId', this.settings.id)
                    .appendTo($cart);

                $counter.text(sc.find('selected').length+1);
                $counter.attr('value', sc.find('selected').length+1);

                $total.text(recalculateTotal(sc));
                $total.attr('value', recalculateTotal(sc));

                return 'selected';
            }
                alert('You can only choose '+ maxSeats + ' seats.');
                return 'available';

        } else if (this.status() == 'selected') { //Checked

                //Update Number
                $counter.text(sc.find('selected').length-1);
                $counter.attr('value', sc.find('selected').length-1);

                //Delete reservation
                $('#cart-item-'+this.settings.id).remove();

                //update totalnum
                $total.text(recalculateTotal(sc));
                $total.attr('value', recalculateTotal(sc));

                //Delete reservation
                  //$('#cart-item-'+this.settings.id).remove();
                //optional
                return 'available';

        } else if (this.status() == 'unavailable') { //sold
            return 'unavailable';

        } else {
            return this.style();
        }
    }
});
function number_format (number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase

  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''
  var toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec)
    return '' + (Math.round(n * k) / k)
      .toFixed(prec)
  }
  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }
  return s.join(dec)
}

// Add total money
function recalculateTotal(sc) {
    var total = 0;
    $('#selected-seats').find('option:selected').each(function () {
        total += Number($(this).attr('alt'));
    });

    return number_format(total,2,'.','');
}

</script>


<!-- // This file is viewed by a PHP file in a form like this -->

        <div class="demo" style="margin-top:10px;min-width: 360px;">
            <div id="seat-map">
                <div class="front">SCREEN</div>     
            </div>
            <div id="legend"></div>
        </div>


        <form role="form" id="myfrm2" action="book.php?id=<?php echo $FILM_ID; ?>" method="post">
            <input type="hidden" name="session" value="<?php echo $session; ?>">
            <input type="hidden" name="date" value="<?php echo $date; ?>">

      <select class="form-control" style="display:block;" id="selected-seats" name="seat[]" multiple="multiple"></select>

            <p>Tickets: <input id="counter" name="counter" readonly></input></p>
            <p>Total: <b>&niara;<input id="total" name="total" readonly></input></b></p>
            <button type="submit" style="display: block; width: 100%;" name="book" value="book" class="btn btn-danger">Book</button>
        </form>
        <!-- <?php  ?>       -->
        </div>
<!-- All data are inserted into a DB mysql by this PHP file -->

<?php 
if (isset($_POST['book'])) {
    $date = $_POST["date"];
    $session = $_POST["session"];
    $counter = $_POST["counter"];
    $total = $_POST["total"];
    $user_id = $_SESSION["id"];
    $film_id = $_GET['id'];
    $seat = (isset($_POST['seat']) ? $_POST['seat']:array());
    if (is_array($seat)) {                  
        foreach ($seat as $selectedOption){
            $query = "INSERT INTO booking(USER_ID, FILM_ID, BOOKING_SESSION, BOOKING_DATE, BOOKING_SEAT, BOOKING_PRICE, BOOKING_NUM) 
                        VALUES ('$user_id','$film_id','$session','$date','$selectedOption','$total','$counter')";

            $result = mysqli_query ($connection,$query)
                or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");   
            }
        echo "  <div class='alert alert-success' role='success'>
                    Congrats your booking has been done! Print the tickets <a href='./fpdf18/generate-pdf.php?film=$film_id' target='_blank'>here</a>!
                </div>";
    }

} 
?>


<!--
Everything works correctly, all data are inserted in the DB !

But I have added a data to insert to the DB, the price SEAT_PRICE, so I have changed the "option selected" in the JS file to this

$('<option selected>R'+(this.settings.row+1)+' S'+this.settings.label+' P'+this.settings.data.price+'</option>')
the price (the tag in the console is "alt" is now visible on the page but I don't understand how to store this data to the DB.

Any suggestion is appreciated

share improve this question
asked
Mar 16 '17 at 14:31

Giumazzi
66●11 gold badge●11 silver badge●1111 bronze badges edited
Mar 16 '17 at 21:57

Ultimately, the problem is that in the OPTION I have a value (in this case the coordinates of the seat) and a alt (the price). How do I trap the alt variable? – Giumazzi Mar 17 '17 at 15:09 
add a comment
1 Answer
order by  
up vote
0
down vote
accepted
OK after many attempts and posts in many forum, I have found my solution.

-->
</body>
</html>