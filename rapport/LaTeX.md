# Texte
Pour écrire simplement du texte il suffit de l'écrire dans le fichier sans mise en forme supplémentaire\
Par contre pour faire un retour à la ligne il faudra écrire `\\`\
Par exemple:
```
Une ligne\\
Une autre ligne
```

# Structure
Pour créer des sections et des sous-sections on utilise `\section{}` et `\subsection{}`\
Par exemple, pour réaliser cette structure:
```
1. Grand titre
1.1 Moyen titre
1.1.1 Petit titre
```
On écrira:
```
\section{Grand titre}
\subsection{Moyen titre}
\subsubsection{Petit titre
```

# Listes à puce
Pour faire des listes à puce comme ceci:
* Un point
* Deux points
* Trois points

On écrira:
```
\begin{itemize}
  \item Un point
  \item Deux points
  \item Trois points
\end{itemize}
```

Pour une liste ordonnée un remplacera simplement `itemize` par `enumerate`

# Les images
Pour insérer des images il faut reprendre la structure du bloc suivant:
```
\begin{figure}[H]
  \includegraphics[width=\linewidth]{<chemin-de-l-image>}
  \caption{<description-del-image>}
  \label{fig:<un-label-court>}
\end{figure}
```

Par exemple pour la maquette de la page d'accueil:
```
\begin{figure}[H]
  \includegraphics[width=\linewidth]{images/maquette-accueil.png}
  \caption{Page d'accueil.}
  \label{fig:maquette-accueil}
\end{figure}
```
