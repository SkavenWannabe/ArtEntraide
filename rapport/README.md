# -- Syntaxe LaTeX --

# Texte
Pour écrire simplement du texte, il suffit de l'écrire dans le fichier sans mise en forme supplémentaire.\
Par contre, pour faire un retour à la ligne il faudra écrire `\\`\
Par exemple:
```tex
Une ligne\\
Une autre ligne
```
# Commentaire
Tout ce qui suit un caractère % sera ignoré\
`% commentaire sur une ligne`

# Structure
Pour créer des sections et des sous-sections, on utilise `\section{}` et `\subsection{}`\
Par exemple, pour réaliser cette structure:
```
1. Grand titre
1.1 Moyen titre
1.1.1 Petit titre
```
On écrira:
```tex
\section{Grand titre}
\subsection{Moyen titre}
\subsubsection{Petit titre}
```

# Listes
Pour faire des listes à puces comme ceci:
* Un point
* Deux points
* Trois points

On écrira:
```tex
\begin{itemize}
  \item Un point
  \item Deux points
  \item Trois points
\end{itemize}
```

Pour une liste ordonnée, on remplacera simplement `itemize` par `enumerate`

# Formatage de texte basique

```tex
\textbf{Texte en gras}
\textit{Texte en italique}
\underline{Texte souligné}
\texttt{Texte en largeur fixe (type bloc de code)}
```
# Les images
Pour insérer des images, il faut reprendre la structure du bloc suivant:
```tex
\begin{figure}[H]
  \includegraphics[width=\linewidth]{<chemin-de-l-image>}
  \caption{<description-del-image>}
  \label{fig:<un-label-court>}
\end{figure}
```

Par exemple pour la maquette de la page d'accueil:
```tex
\begin{figure}[H]
  \includegraphics[width=\linewidth]{images/maquette-accueil.png}
  \caption{Page d'accueil.}
  \label{fig:maquette-accueil}
\end{figure}
```
