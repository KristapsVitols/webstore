let user_id;

//Search Bar
function ajaxCall() {
	let inputValue = $('#searchBar').val();
	if(inputValue != "") {
		$.post('inc/ajax/search.php', {inputValue: inputValue}, function(data) {
			let newData = JSON.parse(data);
			$('div').removeClass('showpage');
			if(newData.length == 0) {
				$('.center-col').html("<div class='display-message notFound'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> No product/-s found matching that name</div>");
			} else {
				let result = `<div class='display-message found'><i class='fa fa-check' aria-hidden='true'></i> ${newData.length} product/-s found matching that name</div><ul>`;
				newData.forEach(function(item) {
					result += `<li>
									<span class='product-category'><a href=products.php?category=${item.category.toLowerCase()}>${item.category}</a></span>
									<a href='product.php?id=${item.id}'><img src='assets/images/product-1.png' alt='product image'></a>
									<a href='product.php?id=${item.id}'><span class='product-name'>${item.make} ${item.model}</span></a>
									<span class='price'>Price: ${item.price}</span>
								</li>`;

				});
				result += '</ul>';
				$('.center-col').html(result);
			}
		});
	}
}

$('#searchBtn').on('click', function() {
	ajaxCall();
});

$('#searchBar').on('keypress', function(e) {
	if(e.which == 13) {
		ajaxCall();
	}
});


//Logout
$('#logoutBtn').on('click', function() {
	$.post('inc/ajax/logout.php', function() {
		window.location.replace('login.php');
	});
});

//Show Cart Items
$('#shopping-cart').on('mouseenter', function() {
	$('.cart-items').css("display", "block");
});

$('.cart-items').on('mouseleave', function() {
	$('.cart-items').css("display", "none");
});

//Add To Cart
$('.add-to-cart').on('click', function() {
	let productId = $('.product-id').val();
	let price = $('.product-price').val();
	let quantity = $('#quantity').val();
	console.log(quantity);
	$.post('inc/ajax/add_cart.php', {product_id: productId, user_id: user_id, quantity: quantity, price: price}, function() {
		window.location.reload();
	});
});

//Sign in to Add
$('.sign-to-add').on('click', function() {
	$('.product-info .errorCart').remove();
	$('.product-info').append("<p class='errorCart'>You must <a href='login.php'>log in</a> first to do that!</p>");
});

//Remove item from cart
$('.cart-item').on('click', '#removeCartItem', function(e) {
	e.stopPropagation();
	let value = $(this).data('value');
	console.log(value);
	$.post("inc/ajax/remove_cart.php", {id: value}, function() {
		window.location.reload();
	})
});

$('.changeCart').on('change', function() {
	let quantity = $(this).val();
	let cartItemId = $(this).parent().data('value');
	$.post('inc/ajax/update_cart.php', {quantity: quantity, cartItemId: cartItemId}, function() {
		window.location.reload();
	});
});