<template>
	<v-menu rounded="xl" offset-y persistent :close-on-content-click="false">
		<template v-slot:activator="{ attrs, on }">
			<v-btn
				color="orange lighten-1"
				v-bind="attrs"
				v-on="on"
				icon
				@click="getCommandes"
			>
				<v-icon color="brown darken-4">mdi-text</v-icon></v-btn
			>
		</template>

		<v-list>
			<v-list-item>
				<v-list-item-title class="font-weight-bold text-center"
					>Historique</v-list-item-title
				>
			</v-list-item>
			<v-divider></v-divider>
			<v-list-item class="lien"  link v-for="(commande, key) in commandes" :key="key">
				<router-link class="lien" :to="'/historique/' + commande.user.id">
					<v-list-item-title>Commande {{ commande.id }} </v-list-item-title>
				</router-link>
			</v-list-item>
		</v-list>
	</v-menu>
</template>

<script src="./historiqueCommande.js" />

<style scoped>
.lien {
	color: black;
	text-decoration: none;
}

.lien:active {
	background-color: gray;
}
</style>