<template>
	<v-container>
		<v-stepper v-model="e1">
			<v-stepper-header>
				<v-stepper-step :complete="e1 > 1" step="1"
					>Confirmation de commande</v-stepper-step
				>

				<v-divider></v-divider>

				<v-stepper-step :complete="e1 > 2" step="2"
					>Adresse livraison/facturation</v-stepper-step
				>

				<v-divider></v-divider>

				<v-stepper-step step="3">Voir la facture</v-stepper-step>
			</v-stepper-header>

			<v-stepper-items>
				<v-stepper-content step="1">
					<v-row>
						<v-col
							cols="12"
							sm="12"
							md="3"
							lg="3"
							v-for="(item, key) in commande.commandeList"
							:key="key"
						>
							<v-card class="mb-10">
								<v-list-item>
									<v-list-item-action></v-list-item-action>

									<v-list-item-content>
										<v-list-item-title>{{ item.name }}</v-list-item-title>
										<v-list-item-subtitle
											>prix : {{ item.prix }}</v-list-item-subtitle
										>
										<v-list-item-subtitle
											>quantite : {{ item.quantite }}</v-list-item-subtitle
										>
									</v-list-item-content>
								</v-list-item>
							</v-card>
						</v-col>
					</v-row>

					<v-btn color="orange lighten-4" @click="e1 = 2">Continue</v-btn>

					<v-btn text @click="cancel">Cancel</v-btn>
				</v-stepper-content>

				<v-stepper-content step="2" class="mb-5">
					<v-container>
						<div>
							<h3>Adresse de livraison</h3>
							<v-row>
								<v-text-field
									v-model="commande.livraison.name"
									class="pa-2"
									md="4"
									label="nom"
								></v-text-field>
								<v-text-field
									v-model="commande.livraison.pays"
									class="pa-2"
									md="4"
									label="pays"
								></v-text-field>
							</v-row>
							<v-row>
								<v-text-field
									v-model="commande.livraison.ville"
									class="pa-2"
									md="4"
									label="ville"
								></v-text-field>
								<v-text-field
									v-model="commande.livraison.address"
									class="pa-2"
									md="4"
									label="adresse"
								></v-text-field>
								<v-text-field
									v-model="commande.livraison.postal_code"
									class="pa-2"
									md="4"
									label="code postal"
								></v-text-field>
							</v-row>
						</div>
						<v-switch v-model="selectable" label="Selectable"></v-switch>
						<div v-if="selectable">
							<h3>Adresse de facturation</h3>
							<v-row>
								<v-text-field
									v-model="commande.facturation.name"
									class="pa-2"
									md="4"
									label="nom"
								></v-text-field>
								<v-text-field
									v-model="commande.facturation.pays"
									class="pa-2"
									md="4"
									label="pays"
								></v-text-field>
							</v-row>
							<v-row>
								<v-text-field
									v-model="commande.facturation.ville"
									class="pa-2"
									md="4"
									label="ville"
								></v-text-field>
								<v-text-field
									v-model="commande.facturation.address"
									class="pa-2"
									md="4"
									label="adresse"
								></v-text-field>
								<v-text-field
									v-model="commande.facturation.postal_code"
									class="pa-2"
									md="4"
									label="code postal"
								></v-text-field>
							</v-row>
						</div>
					</v-container>

					<v-btn color="orange lighten-4" @click="commander">Commander</v-btn>

					<v-btn text>Cancel</v-btn>
				</v-stepper-content>

				<v-stepper-content step="3">
					<div class="d-flex justify-space-between">
						<v-btn text @click="getFacture()" color="orange lighten-4"
							>Télécharger votre facture
							<v-icon class="pl-5"
								>mdi-arrow-down-bold-circle-outline</v-icon
							></v-btn
						>
						<v-btn text
							>Annuler
							<v-icon class="pl-5">mdi-close-circle-outline</v-icon></v-btn
						>
					</div>
				</v-stepper-content>
			</v-stepper-items>
		</v-stepper>
		<v-snackbar v-model="snackbar" :timeout="timeout">
			{{ text }}
			<v-btn color="blue" text @click="snackbar = false">Close</v-btn>
		</v-snackbar>
	</v-container>
</template>

<script src="./stepper.js" />