<template>
	<v-sheet
		color="white"
		elevation="0"
		class="px-10 orange lighten-4 pb-2 ma-3"
		rounded="xl"
	>
		<v-row class="d-flex justify-space-around align-center">
			<router-link to="/"
				><v-img
					height="80"
					max-width="120"
					src="/storage/images/logo.png"
					class="image"
				></v-img
			></router-link>

			<v-tooltip bottom v-if="isChecked && isClient">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						color="orange lighten-1"
						to="/producteurs"
						icon
					>
						<v-icon color="brown darken-4">mdi-account-cash</v-icon>
					</v-btn>
				</template>
				<span>Les producteurs</span>
			</v-tooltip>

			<v-tooltip bottom v-if="isChecked && isClient">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						color="orange lighten-1"
						to="/products"
						icon
					>
						<v-icon color="brown darken-4">mdi-bee-flower</v-icon>
					</v-btn>
				</template>
				<span>Les produits</span>
			</v-tooltip>

			<v-tooltip bottom v-if="isChecked && isProducteur">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						:to="'/producteur/' + currentUser.id"
						color="orange lighten-1"
						icon
					>
						<v-icon color="brown darken-4">mdi-account-cog</v-icon>
					</v-btn>
				</template>
				<span>Profil</span>
			</v-tooltip>

			<v-tooltip bottom v-if="isChecked && isAdmin">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						to="/dashboard"
						color="orange lighten-1"
						icon
					>
						<v-icon color="brown darken-4"
							>mdi-account-box-multiple-outline</v-icon
						>
					</v-btn>
				</template>
				<span>Dashboard</span>
			</v-tooltip>

			<v-tooltip bottom v-if="!isChecked">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						color="orange lighten-1"
						to="/login"
						icon
					>
						<v-icon color="brown darken-4">mdi-login</v-icon>
					</v-btn>
				</template>
				<span>Connexion</span>
			</v-tooltip>

			<basket v-if="isChecked" />
			<v-tooltip bottom v-if="isChecked">
				<template v-slot:activator="{ on, attrs }">
					<v-btn
						v-bind="attrs"
						v-on="on"
						@click="logout()"
						color="orange lighten-1"
						icon
					>
						<v-icon color="brown darken-4">mdi-logout</v-icon>
					</v-btn>
				</template>
				<span>Deconnexion</span>
			</v-tooltip>
			<div bottom v-if="isChecked && isClient">
				<historiqueCommande :user="currentUser" />
			</div>
		</v-row>
	</v-sheet>
</template>

<script src="./navbar.js" />

<style scoped>
.image {
	transition: 0.3s;
}

.image:hover {
	-webkit-transform: scale(1.1);
	-ms-transform: scale(1.1);
	transform: scale(1.1);
}
</style>