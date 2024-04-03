<?php return [
  'app' => [
    'name' => 'OctoberCMS',
    'tagline' => 'Getting back to basics',
  ],
  'directory' => [
    'create_fail' => 'Kan ikke oprette mappen: :name',
  ],
  'file' => [
    'create_fail' => 'Kan ikke oprette filen: :name',
  ],
  'page' => [
    'invalid_token' => [
      'label' => 'Ugyldig sikkerhedstoken',
    ],
  ],
  'combiner' => [],
  'system' => [
    'name' => 'System',
    'menu_label' => 'System',
    'categories' => [
      'cms' => 'CMS',
      'misc' => 'Andet',
      'logs' => 'Logs',
      'mail' => 'Mail',
      'shop' => 'Butik',
      'team' => 'Team',
      'users' => 'Brugere',
      'system' => 'System',
      'social' => 'Social',
      'events' => 'Begivenheder',
      'customers' => 'Kunder',
      'my_settings' => 'Mine Indstillinger',
    ],
  ],
  'theme' => [
    'label' => 'Tema',
    'unnamed' => 'Unavngivet tema',
    'name' => [],
  ],
  'themes' => [
    'install' => 'Installer temaer',
    'installed' => 'Installerede temaer',
    'no_themes' => 'Der er ikke installeret nogle temaer fra markedspladsen.',
    'recommended' => 'Anbefalede',
    'remove_confirm' => 'Er du sikker på at du vil fjerne dette tema?',
  ],
  'plugin' => [
    'label' => 'Plugin',
    'unnamed' => 'Unavngivet plugin',
    'name' => [],
  ],
  'plugins' => [
    'enable_or_disable' => 'Aktiver eller deaktiver',
    'enable_or_disable_title' => 'Aktiver eller deaktiver plugins',
    'install' => 'Installer plugins',
    'install_products' => 'Install produkter',
    'installed' => 'Installerede plugins',
    'no_plugins' => 'Der er ikke installeret nogle plugins fra markedspladsen.',
    'recommended' => 'Anbefalede',
    'remove' => 'Fjern',
    'refresh' => 'Opdater',
    'disabled_label' => 'Deaktiveret',
    'disabled_help' => 'Plugins der er deaktiverede, bliver ignoreret af applikationen.',
    'frozen_label' => 'Frys opdateringer',
    'frozen_help' => 'Plugins der er frossede, bliver ignoreret i opdateringsprocessen.',
    'selected_amount' => 'Antal plugins valgt: :amount',
    'remove_confirm' => 'Er du sikker på at du vil fjerne dette plugin?',
    'remove_success' => 'Disse plugins blev fjernet fra systemet.',
    'refresh_success' => 'Disse plugins blev opdateret i systemet.',
    'disable_confirm' => 'Er du sikker?',
    'disable_success' => 'Disse plugins blev deaktiveret.',
    'enable_success' => 'Disse plugins blev aktiveret.',
  ],
  'project' => [
    'attach' => 'Tilknyt Projekt',
    'detach' => 'Frakobl Projekt',
    'none' => 'Ingen',
    'id' => [
      'missing' => 'Specificer venligst et projekt ID.',
    ],
    'detach_confirm' => 'Er du sikker på at du vil frakoble dette projekt?',
    'unbind_success' => 'Projektet er blevet frakoblet.',
  ],
  'settings' => [
    'search' => 'Søg',
  ],
  'mail' => [
    'smtp_ssl' => 'SSL forbindelse påkrævet',
  ],
  'mail_templates' => [
    'name_comment' => 'Unikt navn der bruges til at referere til denne skabelon',
    'test_send' => 'Send testbesked',
    'test_confirm' => 'Send testbesked til :email. Fortsæt?',
    'creating' => 'Opretter skabelon...',
    'creating_layout' => 'Opretter Layout...',
    'saving' => 'Gemmer Skabelon...',
    'saving_layout' => 'Gemmer Layout...',
    'delete_confirm' => 'Slet denne skabelon?',
    'delete_layout_confirm' => 'Slet dette layout?',
    'deleting' => 'Sletter Skabelon...',
    'deleting_layout' => 'Sletter Layout...',
    'sending' => 'Sender test besked...',
    'return' => 'Tilbage til skabelonoversigt',
  ],
  'install' => [],
  'updates' => [
    'plugin_author' => 'Ejer',
    'plugin_not_found' => 'Plugin not found',
    'core_build' => 'Build :build',
    'core_build_help' => 'Seneste build er tilgængelig.',
    'themes' => 'Temaer',
    'plugin_version_none' => 'Nyt plugin',
    'plugin_current_version' => 'Nuværende version',
    'theme_new_install' => 'Ny tema installation.',
    'theme_extracting' => 'Udpakker tema: :name',
    'update_label' => 'Opdater software',
    'update_loading' => 'Loader tilgængelige opdateringer...',
    'force_label' => 'Tvangsopdater',
    'found' => [
      'label' => 'Ny opdateringer blev fundet!',
      'help' => 'Tryk opdater software, for at begynde opdateringsprocessen.',
    ],
    'none' => [
      'label' => 'Ingen opdateringer',
      'help' => 'Der blev ikke fundet nogle nye opdateringer.',
    ],
    'important_action' => [
      'empty' => 'Vælg handling',
      'confirm' => 'Bekræft opdatering',
      'skip' => 'Skip dette plugin (Kun en gang)',
      'ignore' => 'Skip dette plugin (altid)',
    ],
    'important_action_required' => 'Handling påkrævet',
    'important_view_guide' => ' se opgraderingsguide',
    'important_alert_text' => 'Nogle opdatering kræver din opmærksomhed.',
    'details_title' => 'Plugindetaljer',
    'details_view_homepage' => 'Se hjemmeside',
    'details_current_version' => 'Nuværende version',
    'details_author' => 'Ejer',
  ],
  'server' => [
    'connect_error' => 'Fejl i forbindelse til server.',
    'response_not_found' => 'Opdateringsserveren kunne ikke findes.',
    'response_invalid' => 'Ugyldigt svar fra serveren.',
    'response_empty' => 'Tomt svar fra serveren.',
    'file_error' => 'Det lykkedes ikke serveren at sende pakken.',
    'file_corrupt' => 'Filen fra serveren er beskadiget.',
  ],
  'behavior' => [
    'missing_property' => 'Klassen :class skal definere instansvariablen $:property, som bliver brugt af :behavior behavioren.',
  ],
  'config' => [
    'not_found' => 'Kunne ikke finde konfigurationsfilen :file defineret for :location.',
    'required' => 'Konfiguration brugt i :location skal angive værdien for \':property\'.',
  ],
  'zip' => [
    'extract_failed' => 'Kunne ikke udpakke corefilen \':file\'.',
  ],
  'event_log' => [],
  'request_log' => [
    'empty_link' => 'Tøm requestloggen',
    'empty_loading' => 'Tømmer requestloggen...',
    'empty_success' => 'Requestloggen blev tømt.',
    'return_link' => 'Tilbage til requestloggen.',
    'id' => 'ID',
  ],
  'permissions' => [
    'name' => 'System',
    'manage_system_settings' => 'Administrer systemindstillinger',
    'manage_software_updates' => 'Administrer softwareopdateringer',
    'access_logs' => 'Vis systemlogs',
    'manage_mail_templates' => 'Administrer mailskabeloner',
    'manage_mail_settings' => 'Administrer mailindstillinger',
    'manage_other_administrators' => 'Administrer andre backendbrugere',
  ],
  'media' => [
    'invalid_path' => 'Ugyldig sti: \':path\'.',
    'folder_size_items' => 'ting',
  ],
];
