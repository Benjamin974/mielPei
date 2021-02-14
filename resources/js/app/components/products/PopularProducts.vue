<template>
	<div>
		<v-row class="mb-12">
			<v-col md="4" v-for="(product, key) in products" :key="key">
				<v-card class="mx-auto" max-width="344" outlined>
					<v-img :src="product.image" height="200px"></v-img>

					<v-card-title> {{ product.name }} </v-card-title>

					<v-card-subtitle class="pa-0 pl-4 pr-4">
						Prix: {{ product.prix }} €
					</v-card-subtitle>
					<v-card-subtitle class="pa-0 pl-4 pr-4">
						Dispo: {{ product.quantite }} €
					</v-card-subtitle>
					<addInBasket :product="product" />
				</v-card>
			</v-col>
		</v-row>
	</div>
</template>

<script src="./popularProducts.js" />