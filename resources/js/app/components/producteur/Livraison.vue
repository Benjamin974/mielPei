<template>
	<div>
			<v-card-title class="mb-10">{{ commande.product.name }}</v-card-title>
			<v-card-text>
				produit present dans la commande n° {{ commande.id }}
			</v-card-text>
			<v-card-text> quantité à livrer : {{ commande.quantite }} </v-card-text>
			<v-card-actions v-if='livraison == null'>
				<v-btn  @click="addLivraison(commande)" depressed
					>Livrer le produit</v-btn
				>
			</v-card-actions>

        <v-card-text v-if='livraison != null'>
          Livraison : {{ livraison.status.status }}
        </v-card-text>
	</div>
</template>

<script src="./livraison.js" />