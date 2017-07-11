<?php
/**
 * Klasa Page kontrolera.
 */
class PageController extends Controller {
    
    /**
     * Metod Page kontrolera koji ispisuje sadrzaj o nama stranice.
     */
    public function onama() {
        $this->set('title', 'O nama');
        $this->set('prvi_pasus', 'Sve je počelo u mirnom delu pešacke zone Knez Mihailove Ulice 2010. godine. Grupa mladih ljudi je bila spremna i odlučna da na trzištu satova i nakita ponudi nešto novo. Koncept multibrend radnje koja ce na jednom mestu spojiti renomirane svetske brendove i uz izvanrednu i profesionalnu uslugu biti adresa na kojoj ce Vaše zadovoljstvo biti merilo naseg uspeha. Brendovi Fossil, Festina, Casio, Seiko i Citizen predstavljaju samo deo bogate ponude gde ce vecina ljubitelja satova uvek pronaci interesantan model. Iako za ručni sat stoji da je jedini prihvatljiv komad nakita za modernog poslovnog coveka, pripadnicama lepseg pola u našim radnjama je na raspolaganju pregršt brendova kao sto su Michael Kors, FOSSIL, CAVALLI, GUESS koji pored satova nude i prefinjene komade nakita. U našim radnjama mozete naći i nemački brend s.Oliver, koji pored damskih i muških satova nudi možda i najveću ponudu na trzistu dečijih satova.');
        $this->set('drugi_pasus', 'Kolekcija ima mnogo, kao i Vaših želja! Uvek nastojimo da maksimalno stručno i iskreno pomognemo u odabiru modela za Vas i Vase najdraže. Posebno mesto u našoj ponudi su usluge našeg servisa, koji je do sada velikom broju "dragih uspomena" vratio sjaj i udahnuo novi život. Vaš osmeh, zadovoljstvo i stisak ruke daju nam energiju da nastavimo ovim putem i budemo još bolji. Daćemo sve od sebe da kvalitet naših usluga bude kao i vreme-konstantno i bez prekida.');
        $this->set('treci_pasus', 'Čekamo Vas, Dobrodošli.');
    }
    
    /**
     * Metod Page kontrolera koji ispisuje sadrzaj kontakt stranice.
     */
    public function kontakt() {
        $this->set('title', 'Kontaktirajte nas');
    }
}
