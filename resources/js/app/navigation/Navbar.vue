<template>
	<v-sheet color="white" elevation="1" class="pt-10 pb-10 orange lighten-4" rounded="xl">
		<v-row class="d-flex justify-space-around align-center">
			<v-tooltip bottom>
				<template v-slot:activator="{ on, attrs }">
					<v-btn v-bind="attrs" v-on="on" color="orange lighten-1" to="/" icon>
						<v-icon color="brown darken-4">mdi-home</v-icon>
					</v-btn>
				</template>
				<span>Accueil</span>
			</v-tooltip>

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
						<v-icon color="brown darken-4">mdi-account-box-multiple-outline</v-icon>
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
		</v-row>
	</v-sheet>
</template>

<script src="./navbar.js" />