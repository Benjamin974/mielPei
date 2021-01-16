<template>
	<v-hover v-slot="{ hover }">
		<v-card
			:class="{ 'on-hover': hover }"
			class="mx-auto"
			max-width="344"
			outlined
			rounded
		>
			<v-list-item three-line>
				<v-list-item-avatar tile size="80" color="grey"><v-img src="/storage/images/producteurs/prod.png"></v-img
					></v-list-item-avatar>
				<v-list-item-content>
					<v-list-item-title class="headline mb-1 font-weight-bold">
						{{ producteur.name }}
					</v-list-item-title>
					<v-list-item-subtitle
						>{{ fiche.content }}</v-list-item-subtitle
					>
				</v-list-item-content>
			</v-list-item>

			<v-card-actions>
				<fiche :fiche='fiche' :products='products'/>
			</v-card-actions>
		</v-card>
	</v-hover>
</template>

<script src="./cardProducteur.js" />