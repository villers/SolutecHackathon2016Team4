# Git

Sera communiqué lors du départ.

N'oubliez pas de créer un compte Github si ce n'est pas déjà fait.

Attention, il est important de régulièrement push et commit quand vous avez terminé une fonctionnalitée. Car nous aurons des démonstrations en plein après-midi le Samedi.

Pour garder un git sain qui ne foire pas quand vous pullez, il faut principalement, que les fichiers qui vont être touchés par la fusion du pull, ne fassent pas actuellement l’objet de modifs locales ! 

Si jamais c'est le cas, faîtes un "git stash" pour mettre vos modifications de côté, pullez, faîtes un "git stash apply" pour appliquer vos modifications sur la dernière version.

Pour les branches, c'est très simple :

- git branch xxx : créer une branche xxx
- git checkout xxx : change la branche courante sur la branche xxx
- git checkout master : change la branche courante sur la branche principal
- git branch -d xxx : delete la branche xxx

Quand vous pushez sur une branche, c'est comme ca : git push origin xxx

Les commandes sympa hormis add, commit, log, branch :

- git stash : met vos modifications de côté, reviens à l'état du dernier pull
- git stash apply : applique vos modifications que vous avez mis de côté.
- git checkout : change la branche courante de votre Git
- git merge xxx : fusionne la branche courante avec une autre

Si vous souhaitez tout supprimer et retrouver un git sain :

```sh
git fetch origin
git reset --hard origin/master
```

Qu'en cas d'urgence car vous perdez toute vos modifications !
