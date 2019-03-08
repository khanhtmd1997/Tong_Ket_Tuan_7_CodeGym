<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
</head>
<body>
	
	<form method="get" action="">
		<div style="margin-left: 500px;margin-top: 100px;">
			<div class="title">
				<h1>Giỏ Hàng</h1>
			</div>
			<div class="row"  >
				<div class="col-12">
					<h4>{{ $product->name }}</h4>
					<p>${{ $product->price }}</p>
					<p><img src="{{ asset('storage/'.$product->picture) }}" width="150" height="auto"></p>
					<p>Số lượng mua
						<select class="soluong" id="soluong" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</p>
				</div>
			</div>
			<div>
				<button type="submit" class="btn btn-primary" style="background-color: yellow;">Mua Ngay</button>
                <button class="btn btn-secondary" style="background-color: black;color: white" onclick="window.history.go(-1); return false;">Hủy</button>
			</div>
		</div>
	</form>
	
</body>
</html>