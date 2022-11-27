const int_convert_rupiah = (angka) => {
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}


const increment = async (product_url, product_price) => {
  quantity = parseInt(document.getElementById("quantity_" + product_url).innerHTML);

  price_match = product_price.match(/\d+/g).join('');
  price_product = parseInt(price_match.substr(0, price_match.length - 2));
  price_total   = price_product * (quantity + 1);

  // total cart price
  total_cart_price = document.getElementById("total_cart_price")
                    .innerHTML.match(/\d+/g).join('');
  total_cart_price_parse = parseInt(total_cart_price
                          .substr(0, total_cart_price.length - 2));
  document.getElementById("total_cart_price").innerHTML = int_convert_rupiah(
    total_cart_price_parse + price_product)+",00";
  document.getElementById("total_cart_price1").innerHTML = int_convert_rupiah(
    total_cart_price_parse + price_product)+",00";

  let total_item = parseInt(document.getElementById("total_item_cart").innerHTML);
  document.getElementById("total_item_cart").innerHTML = total_item + 1;

  const requestOptions = { method : 'GET' };
  await fetch(`http://192.168.137.1/update_cart/?product=${product_url}&quantity=${quantity + 1}`, requestOptions)
    .then(response => response.json())
    .then(data =>  {
      document.getElementById("total_" + product_url).innerHTML = int_convert_rupiah(price_total)+",00";
      document.getElementById("quantity_" + product_url).innerHTML = data.quantity;
    });

  document.getElementById("total_" + product_url).innerHTML = int_convert_rupiah(price_total)+",00";
  document.getElementById("quantity_" + product_url).innerHTML = quantity + 1;
}


const decrement = async (product_url, product_price) => {
  quantity = parseInt(document.getElementById("quantity_" + product_url).innerHTML);

  if (quantity <= 1) {
    document.getElementById("total_" + product_url).innerHTML = product_price;
    document.getElementById("quantity_" + product_url).innerHTML = 1;

  } else {
    price_match = product_price.match(/\d+/g).join('');
    price_product = parseInt(price_match.substr(0, price_match.length - 2));
    price_total   = price_product * (quantity - 1);

    // total cart price
    total_cart_price = document.getElementById("total_cart_price")
      .innerHTML.match(/\d+/g).join('');
    total_cart_price_parse = parseInt(total_cart_price
            .substr(0, total_cart_price.length - 2));
    document.getElementById("total_cart_price").innerHTML = int_convert_rupiah(
    total_cart_price_parse - price_product)+",00";
    document.getElementById("total_cart_price1").innerHTML = int_convert_rupiah(
    total_cart_price_parse - price_product)+",00";

    let total_item = parseInt(document.getElementById("total_item_cart").innerHTML);
    document.getElementById("total_item_cart").innerHTML = total_item - 1;

    const requestOptions = { method : 'GET' };
    await fetch(`http://192.168.137.1/update_cart/?product=${product_url}&quantity=${quantity - 1}`, requestOptions)
      .then(response => response.json())
      .then(data =>  {
        document.getElementById("total_" + product_url).innerHTML = int_convert_rupiah(price_total)+",00";
        document.getElementById("quantity_" + product_url).innerHTML = data.quantity;
      });
  }
}