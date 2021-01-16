
<template>
	<v-container>
		<v-simple-table>
			<template v-slot:default>
				<thead>
					<tr>
						<th class="text-left">Produit</th>
						<th class="text-left">Quantite</th>
						<th class="text-left">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(product, key) in basket" :key="key">
						<td>{{ product.name }}</td>
						<td>
							<v-text-field
								type="number"
								v-model="product.quantite"
								@input="updateQuantity(product)"
							></v-text-field>
						</td>
					</tr>
				</tbody>
				<v-btn class="mt-10" color="orange lighten-4" @click="commander" depressed>
					Commander
				</v-btn>
			</template>
		</v-simple-table>
	</v-container>
</template>

<script src="./basket.js">
</script>