<template>
	<v-row class="mb-5">
		<v-col md="4" v-for="(product, key) in products" :key="key">
			<v-card outlined>
				<v-row>
					<v-col md="6">
						<v-img
							height="200"
							:src="product.product.image"
              class="hidden-md-and-down"
						></v-img
					>	<v-img
							height="150"
							:src="product.product.image"
              class="hidden-lg-and-up"
						></v-img
					></v-col>
					<v-col md="6">
						<v-card-title> {{ product.product.name }}</v-card-title>
						<v-card-text>Quantité : {{ product.quantite }}</v-card-text>
					</v-col>
				</v-row>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
import { apiService } from "../../_services/apiService";

export default {
	props: {
		commande: {
			default: function () {
				return {};
			},
		},
	},

	data() {
		return {
			products: [],
		};
	},
	created() {
		this.getProducts();
	},

	methods: {
		getProducts() {
			apiService
				.get("/api/commande/" + this.commande.id + "/products")
				.then(({ data }) => {
					data.data.forEach((product) => {
						this.products.push(product);
					});
				});
		},
	},
};
</script>