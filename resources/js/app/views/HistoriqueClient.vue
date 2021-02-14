<template>
	<v-container>
		<h1>Historique des commandes</h1>
		<v-sheet
			rounded="rounded"
			class="my-10 pa-5"
			width="100%"
			v-for="(commande, key) in commandes"
			:key="key"
		>
			<h3 class="mb-10">Commande n°{{ commande.id }}</h3>
			<productsCommande :commande='commande' />
      <v-card-text>Adresse de livraison : {{commande.delivery.address}}</v-card-text>
      <v-card-text>Adresse de facturation : {{commande.billing.address}}</v-card-text>
		</v-sheet>
	</v-container>
</template>

<script src="./historiqueClient.js" />