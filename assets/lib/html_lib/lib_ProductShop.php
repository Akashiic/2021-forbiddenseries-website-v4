<div class="akashic-modal">

	<div class="akashic-shadow-background escape-background"></div>
	<div class="akashic-modal-container">
		<h1>Adicionar Produto</h1>
		<hr id="hr-amc">
		<form id="pfData" enctype="multipart/form-data">
			<ul>
				<li><input id="product-shop-name" name="productName" type="text" placeholder="Nome do Produto" /></li>
				<li><input id="product-shop-price" name="productPrice" type="text" placeholder="Preço do Protudo" /></li>
				<li>
					<select id="product-type-item" name="productTypeItem">
						<option value="Item">Item</option>
					</select>
				</li>
				<li><textarea id="product-shop-info" name="productDesc" maxlength="300" placeholder="Descrição do Produto"></textarea></li>
				<li><input class="form-control" name="productImage" type="file" id="formFileMultiple" multiple></li>
			</ul>

			<div class="product-container-footer">
				<div class="hr-akashic"></div>
				<div class="button-conclusion-product">
					<button type="submit" class="btn btn-success eixo-conclusion">Concluir</button>
					<button type="button" class="btn btn-danger escape-background">Cancelar</button>
				</div>
				<div>
		</form>
	</div>

</div>