const int_convert_rupiah = (angka) => {
    var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

// total cart price
total_cart_price = document.getElementById("total_cart_price")
.innerHTML.match(/\d+/g).join('');
total_cart_price_parse = parseInt(total_cart_price
      .substr(0, total_cart_price.length - 2));
document.getElementById("total_cart_price").innerHTML = int_convert_rupiah(
total_cart_price_parse + price_product)+",00";